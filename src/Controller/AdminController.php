<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Prof;
use App\Form\ProfType;
use App\Entity\Etudiants;
use App\Entity\Secretaire;
use App\Form\PersonelType;
use App\Repository\ProfRepository;
use App\Repository\EtudiantsRepository;
use App\Repository\SecretaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }
    /**
     * @Route("/admin/prof/show", name="show_prof")
     */
    public function admin_show_prof(ProfRepository $repo){
        $repo = $this->getDoctrine()->getRepository(Prof::class);
        $prof = $repo->findAll();
        return $this->render('admin/show-prof.html.twig',[
            'prof' => $prof,
        ]);
    }
    /**
     * @Route("/admin/etd/show", name="show_etd")
     */
    public function admin_show_etd(EtudiantsRepository $repo){
        $repo = $this->getDoctrine()->getRepository(Etudiants::class);
        $etd = $repo->findAll();
        return $this->render('admin/show-etudiant.html.twig',[
            'etd' => $etd,
        ]);
    }
    /**
     * @Route("/admin/test", name="test")
     */
    public function test(){
        $fichier = 'C:\Users\Opac\Desktop\GCS\public\file.xml';
        $xml = simplexml_load_file($fichier);
        return $this->render('admin/test.html.twig',[
            'xml' => $xml,
        ]);
    }
    /**
     * @Route("/admin/prof/{id}/detail", name="prof_detail")
     */
    public function detail_prof(Prof $prof){
        return $this->render('admin/detail_prof.html.twig',[
            'prof' => $prof,
        ]);
    }
    /**
     * @Route("/admin/prof/{id}/contrat", name="prof_contrat")
     */
    public function contrat_prof(Prof $prof){
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
           
           // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
           
           // Retrieve the HTML generated in our twig file
        $html = $this->renderView('admin/contrat.html.twig', [
            'prof' => $prof
        ]);
           
           // Load HTML to Dompdf
        $dompdf->loadHtml($html);
           
           // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');
   
           // Render the HTML as PDF
        $dompdf->render();
   
           // Output the generated PDF to Browser (force download)
         $dompdf->stream("contrat.pdf", [
               "Attachment" => false
        ]);   

        return $this->redirectToRoute('show_prof');
    }
    /**
     * @Route("/admin/prof/new", name="prof_create")
     * @Route("/admin/prof/{id}/edit", name="prof_edit")
     */
    public function form(Prof $prof = null, Request $request, ObjectManager $manager){
        
        $file = 'C:\Users\Opac\Desktop\GCS\public\archive\professeur.xml';
        if(!$prof){
            $prof = new Prof();
        }    
       
        $form = $this->createForm(ProfType::class, $prof);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($prof);
            $manager->flush();

            $data = simplexml_load_file($file);
            $teacher = $data->addChild('professeur');
        //    $teacher = $data->addChild(PHP_EOL);
            $teacher->addChild('fname',$prof->getNomProf());
            $teacher->addChild('lname',$prof->getPrenomProf());
            $teacher->addChild('email',$prof->getEmailProf());
            $data->saveXML($file);

            return $this->redirectToRoute('show_prof');
        } 

        return $this->render('admin/edit-html.twig', [
            'formProf' => $form->createView(),
            'editMode' => $prof->getId() !== null,
        ]);
    }
    /**
     * @route("/admin/personel/show", name="show_personel")
     */
    public function personel_show_list(){

        $repo = $this->getDoctrine()->getRepository(Secretaire::class);
        $secretaire = $repo->findAll(); 
        return $this->render('admin/show.personel.html.twig', [
           'personel' => $secretaire
       ]);
    }   
    /**
     * @Route("/admin/personel/new", name="personel_create")
     * @Route("/admin/personel/{id}/edit", name="personel_edit")
     */
    public function formPerso(Secretaire $secretaire = null, Request $request, ObjectManager $manager){
        
        $file = 'C:\Users\Opac\Desktop\GCS\public\archive\personel.xml';
        if(!$secretaire){
            $secretaire = new Secretaire();
        }  

        $form = $this->createForm(PersonelType::class, $secretaire);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

        //    $hash = $encoder->encodePassword($secretaire, $secretaire->getPassword());
         //   $secretaire->setPassword($hash);
            $manager->persist($secretaire);
            $manager->flush();

            $data = simplexml_load_file($file);
            $perso = $data->addChild('personel');
            $perso->addChild('fname',$secretaire->getSereNom());
            $perso->addChild('lname',$secretaire->getSecrPrenom());
            $perso->addChild('email',$secretaire->getEmailSecr());
            $data->saveXML($file);

            return $this->redirectToRoute('show_personel');
        }

        return $this->render('admin/edit-personel-html.twig', [
            'formPersonel' => $form->createView(),
            'edit' => $secretaire->getId() !== null,
        ]);
    }
    /**
     * @Route("/admin/personel/{id}/detail", name="personel_detail")
     */
    public function detail_personel(Secretaire $secretaire){
        return $this->render('admin/detail_secretaire.html.twig',[
            'secr' => $secretaire,
        ]);
    }
    /**
     * @Route("/admin/personel/{id}/contrat", name="personel_contrat")
     */
    public function contrat_prersonel(Secretaire $secretaire){
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
           
           // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
           
           // Retrieve the HTML generated in our twig file
        $html = $this->renderView('admin/contrat_personel.html.twig', [
            'secre' => $secretaire
        ]);
           
           // Load HTML to Dompdf
        $dompdf->loadHtml($html);
           
           // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');
   
           // Render the HTML as PDF
        $dompdf->render();
   
           // Output the generated PDF to Browser (force download)
         $dompdf->stream("contrat secretaire.pdf", [
               "Attachment" => false
        ]);   
    }        
    /**
     * @Route("/admin/prof/{id}/delete", name="prof_delete")
     * @Method({"DELETE"})
     */
    public function delete_professeur(Request $request, $id) {
        $pr = $this->getDoctrine()->getRepository(Prof::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($pr);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();
    }
    /**
     * @Route("/admin/personel/{id}/delete", name="personel_delete")
     * @Method({"DELETE"})
     */
    public function delete_serce(Request $request, $id) {
        $prs = $this->getDoctrine()->getRepository(Secretaire::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($prs);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();
    }

}
