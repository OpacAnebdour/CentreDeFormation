<?php

namespace App\DataFixtures;

use App\Entity\Prof;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProfFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i = 1; $i <=10; $i++){
            $prof = new Prof();
            $prof->setNomProf($faker->name)
                 ->setPrenomProf($faker->name)
                 ->setEmailProf($faker->freeEmail)
                 ->setCinProf($faker->swiftBicNumber)
                 ->setNumTeleProf($faker->e164PhoneNumber)
                 ->setAdresseProf($faker->streetAddress)
                 ->setNumCarteBankProf($faker->creditCardNumber)
                 ->setSalaireProf($faker->numberBetween($min = 6000, $max = 9000))
                 ->setProfMatiere($faker->name);

            $manager->persist($prof);
        }

        $manager->flush();
    }
}
