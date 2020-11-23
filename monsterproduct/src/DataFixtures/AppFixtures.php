<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 25; $i++) {
            $produit = new Produit();
            $produit
                ->setName($faker->sentence(7))
                ->setDescription($faker->text(70))
                ->setPromo($faker->sentence(7))
                ->setDisplay($faker->sentence(7))
                ->setImage($faker->imageUrl())
                ->setPriceHT($faker->randomFloat(10, 100))
                ->setCreated(new \DateTime());;
            $manager->persist($produit);
        }

        $manager->flush();
    }
}
