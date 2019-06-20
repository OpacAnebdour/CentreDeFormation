<?php

namespace App\DataFixtures;

use App\Entity\Etudiants;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i = 1; $i <=10; $i++){
            $etudiant = new Etudiants();

            $etudiant->setNomEtudiant($faker->name)
                    ->setPrenomEtudiant($faker->name)
                    ->setDateNaissanceEtudiant(new \DateTime())
                    ->setLieuNaissanceEtudiant($faker->city)
                    ->setCinEtudiant($faker->swiftBicNumber)
                    ->setNumTeleEtudiant($faker->e164PhoneNumber)
                    ->setNumTeleParent($faker->e164PhoneNumber)
                    ->setAdresseEtudiant($faker->streetAddress)
                    ->setNiveauEtudiant($faker->randomLetter);

            $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
