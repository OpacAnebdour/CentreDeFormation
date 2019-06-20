<?php

namespace App\DataFixtures;

use App\Entity\Secretaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SecreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i=1; $i<=10; $i++){
            $secretaire = new Secretaire();

            $secretaire->setSereNom($faker->name)
                      ->setSecrPrenom($faker->name)
                      ->setEmailSecr($faker->freeEmail)
                      ->setAdresseSecr($faker->streetAddress)
                      ->setPassword($faker->password)
                      ->setUsername($faker->username)
                      ->setCinSecr($faker->swiftBicNumber);

            $manager->persist($secretaire);
        }

        $manager->flush();
    }
}
