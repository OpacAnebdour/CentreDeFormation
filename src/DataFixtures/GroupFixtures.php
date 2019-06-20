<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i = 1; $i <=6; $i++){
            $gp = new Groupe();
            $gp->setNumeroGroupe($faker->swiftBicNumber)
                ->setNbEtudiant(0);

            $manager->persist($gp);
        }

        $manager->flush();
    }
}
