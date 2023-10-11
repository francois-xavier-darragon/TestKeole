<?php
namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\DataFixtures\Provider\UserProvider;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Nelmio\Alice\Loader\NativeLoader;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {
        
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new UserProvider($faker));
      
        $loader = new NativeLoader($faker);

        $objects = $loader->loadFile(__DIR__ . '/fixtures.yaml')->getObjects();

        foreach ($objects as $object) {
            $em->persist($object);
        }

        $categories = [];
        for($i = 0; $i < 2; $i++) {
            $categorie = new Categorie();
            $categorie->setNom($faker->word());
            $categorie->setdescription($faker->sentence());
            $em->persist($categorie);

            $categories[] = $categorie;
        }
       
        for($i = 0; $i < 12; $i++) {
            $produit = new Produit($categories[$i % count($categories)]);
            $produit->setNom($faker->word());
            $produit->setdescription($faker->sentence());
            $produit->setDateDeCreation(new \DateTime());
            $produit->setPrix($faker->numberBetween(80, 200));
           
            $em->persist($produit);
        }

        $em->flush();

    }
}