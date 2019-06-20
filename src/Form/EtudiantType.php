<?php

namespace App\Form;

use App\Entity\Etudiants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEtudiant')
            ->add('prenomEtudiant')
            ->add('dateNaissanceEtudiant', DateType::class)
            ->add('lieuNaissanceEtudiant')
            ->add('cinEtudiant')
            ->add('numTeleEtudiant')
            ->add('numTeleParent')
            ->add('adresseEtudiant')
            ->add('niveauEtudiant',  ChoiceType::class,[
                'choices' => [
                    'TC'   => 'TC',
                    '1° collège' => '1° collège',
                    '2° collège' => '2° collège',
                    '3° collège' => '3° collège',
                    '1° bac SM' => '1° bac SM',
                    '1° bac PY' => '1° bac PY',
                    '1° bac SVT' => '1° bac SVT',
                    '2° bac PY' => '2° bac PY',
                    '2° bac SM' => '2° bac SM',
                    '2° bac SVT' => '2° bac SVT',
                ],
                'preferred_choices' => ['1° bac SM', '2° bac SM', '2° bac PY'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiants::class,
        ]);
    }
}
