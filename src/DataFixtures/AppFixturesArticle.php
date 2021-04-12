<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixturesArticle extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        /**
         * Faker : https://github.com/fzaninotto/Faker
         */

        $nb = 150;
        for($i=0; $i < $nb; $i++ ){
            $article = new Article();
            $article->setName($this->faker->sentence($nbWords = 2, $variableNbWords = true));
            $article->setDescription($this->faker->sentence($nbWords = 20, $variableNbWords = true));
            $article->setCategorie($this->faker->word);
            $article->setPrice($this->faker->randomDigitNotNull);
            $article->setUrlImage($this->faker->imageUrl(400, 600, 'cats', true, 'Faker'));
            $manager->persist($article);
            $manager->flush();
        }
    }
}
