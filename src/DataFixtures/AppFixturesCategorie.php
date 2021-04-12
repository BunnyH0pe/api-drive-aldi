<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixturesCategorie extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        /**
         * Faker : https://github.com/fzaninotto/Faker
         */

        $nb = 10;
        for($i=0; $i < $nb; $i++ ){
            $categorie = new Categorie();
            $categorie->setName($this->faker->word);
            $manager->persist($categorie);
            $manager->flush();
        }
    }
}
