<?php

namespace App\Form;

use App\Entity\Prof;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomProf')
            ->add('prenomProf')
            ->add('emailProf', EmailType::class)
            ->add('cinProf')
            ->add('numTeleProf')
            ->add('adresseProf')
            ->add('numCarteBankProf')
            ->add('salaireProf', MoneyType::class)
            ->add('profMatiere',  ChoiceType::class,[
                'choices' => [
                    'mathématique' => 'mathématique',
                    'Physique' => 'Physique',
                    'Français'   => 'Français',
                    'informatique' => 'informatique',
                    'Anglais' => 'Anglais',
                    'Arab' => 'Arab',
                    'histoire géographie' => 'histoire géographie',
                    'Histoire' => 'Histoire',
                ],
                'preferred_choices' => ['mathématique', 'Français', 'informatique'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prof::class,
        ]);
    }
}
