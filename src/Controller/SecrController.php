<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Prof;
use App\Entity\Groupe;
use App\Entity\Etudiants;
use App\Form\EtudiantType;
use App\Entity\GroupEtudiant;
use App\Repository\ProfRepository;
use App\Repository\GroupeRepository;
use App\Repository\EtudiantsRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecrController extends AbstractController
{
    /**
     * @Route("/secre", name="secretaire")
     */
    public function index()
    {
        return $this->render('secr/index.html.twig');
    }
    /**
     * @Route("/secre/show/prof", name="secre_show_prof")
     */
    public function showsecreprof(ProfRepository $repo){

        $repo = $this->getDoctrine()->getRepository(Prof::class);
        $prof = $repo->findAll();
        return $this->render('secr/show-prof.html.twig',[
            'pShow' => $prof,
        ]);
    }
    /**
     * @Route("/secre/etd/show", name="secre_show_etd")
     */
    public function secre_show_etd(EtudiantsRepository $repo){
        $repo = $this->getDoctrine()->getRepository(Etudiants::class);
        $etd = $repo->findAll();
        return $this->render('secr/show-etudiant.html.twig',[
            'etd' => $etd,
        ]);
    }
    /**
     * @Route("/secre/etudiant/new", name="eleve_create")
     * @Route("/secre/etudiant/{id}/edit", name="eleve_edit")
     */
    public function formEtudiant(Etudiants $etudiant = null, Request $request, ObjectManager $manager){
        
        $file = 'C:\Users\Opac\Desktop\GCS\public\archive\etudiant.xml';
        if(!$etudiant){
            $etudiant = new Etudiants();
        }    
       
        $form = $this->createForm(EtudiantType::class, $etudiant);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($etudiant);

            $manager->flush();

            $data = simplexml_load_file($file);
            $studant = $data->addChild('studant');
            $studant->addChild('fname',$etudiant->getNomEtudiant());
            $studant->addChild('lname',$etudiant->getPrenomEtudiant());
            $studant->addChild('email',$etudiant->getNumTeleEtudiant());
            $data->saveXML($file);

            return $this->redirectToRoute('secre_show_etd');
        } 

        return $this->render('secr/edit-html.twig', [
            'formEtud' => $form->createView(),
            'editMode' => $etudiant->getId() !== null,
        ]);
    }
    /**
     * @Route("/secre/etudiant/{id}/delete", name="etd_delete")
     * @Method({"DELETE"})
     */
    public function delete_etudiant(Request $request, $id) {
        $etd = $this->getDoctrine()->getRepository(Etudiants::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($etd);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();
    }
    /**
     * @Route("/secre/etudiant/{id}/detail", name="etd_detail")
     */
    public function show_etudiant(Etudiants $etd){
        return $this->render('secr/detail.html.twig', [
            'etd' => $etd
        ]);
    }
    /**
     * @Route("/secre/etudiant/{id}/group", name="add_to_group")
     */
    public function addtogroup(EtudiantsRepository $repo, $id, Request $request, ObjectManager $manager){
       
    //    $gpetd = new GroupEtudiant();
        $repo = $this->getDoctrine()->getRepository(Etudiants::class);
        
        $res = $this->getDoctrine()->getRepository(Groupe::class);
        $group = $res->findAll();
        
        $etd= $repo->find($id);

        return $this->render('secr/addToGroup-html.twig', [
            'group' => $group,
            'etudiant' => $etd,
        ]);
    }
    /**
     * @Route("/secre/etudiant/error", name="error")
     */
    public function error_affect(){
        return $this->render('secr/error.html.twig');
    }
    /**
     * @Route("/secre/etudiant/{idg}/{ide}/connectGpEtd", name="connect_gp_etd")
     */
    public function connect_gpetd(GroupeRepository $repGrp, Groupe $idg, EtudiantsRepository $repEtd, $ide, ObjectManager $manager){
        $gpetd = new GroupEtudiant();
        $group = new Groupe(); 
        
        $repEtd = $this->getDoctrine()->getRepository(Etudiants::class);
        $etd= $repEtd->find($ide);

        $repGrp = $this->getDoctrine()->getRepository(Groupe::class);
        $grp= $repGrp->find($idg);
    //    dump($grp->setNbEtudiant($grp->getNbEtudiant()+1));
    //    die();
        if($grp->getNbEtudiant() <= 7){
            $gpetd->setIdGroup($grp->getNumeroGroupe());
            $gpetd->setIdEtd($etd->getId());

            $grp->setNbEtudiant($grp->getNbEtudiant()+1);
            
            $manager->persist($gpetd);
        //    $manager->flush();

            $manager->persist($grp);
            $manager->flush();        

            return $this->redirectToRoute('secre_show_etd');
        }
        else{
            return $this->redirectToRoute('error');
        }
    }
    /**
     * @Route("/secre/group/{id}/delete", name="groupe_delete")
     * @Method({"DELETE"})
     */
    public function delete_groupe(Request $request, $id) {
        $grp = $this->getDoctrine()->getRepository(Groupe::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($grp);
        $entityManager->flush();
  
        $response = new Response();
        $response->send();
    }
    /**
     * @Route("/secre/etudiant/groupe/new", name="new_groupe")
     */
    public function new_group(Request $request, ObjectManager $manager){
        $group = new Groupe();  
        $form = $this->createFormBuilder($group)
                    ->add('numeroGroupe')
                    ->add('nbEtudiant')
                    ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($group);
            $manager->flush();

            return $this->redirectToRoute('secre_show_etd');
        } 

        return $this->render('secr/new_group.twig', [
            'formGroupnew' => $form->createView(),
        ]);
    }
    /**
     * @route("/secre/etudiant/{id}/facture", name="blog_facture")
     */
    public function etudiant_facture(Etudiants $etd){
        //   $repo = $this->getDoctrine()->getRepository(Etudiants::class);
   
        //   $etd= $repo->find($id); ArticleRepository $repo, $id
          
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
           
           // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
           
           // Retrieve the HTML generated in our twig file
        $html = $this->renderView('secr/facture.html.twig', [
            'etd' => $etd
        ]);
           
           // Load HTML to Dompdf
        $dompdf->loadHtml($html);
           
           // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');
   
           // Render the HTML as PDF
        $dompdf->render();
   
           // Output the generated PDF to Browser (force download)
         $dompdf->stream("facture.pdf", [
               "Attachment" => false
        ]);   

        return $this->redirectToRoute('secre_show_etd');
       }
    
}
