<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixturesUser extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        /**
         * Faker : https://github.com/fzaninotto/Faker
         */

        $nb = 50;
        for($i=0; $i < $nb; $i++ ){
            $user = new User();
            $user->setFullname($this->faker->name);
            $user->setEmail($this->faker->email);
            $manager->persist($user);
            $manager->flush();
        }
    }
}
