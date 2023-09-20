<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sexeTab =[1=>'male', 2=>'female'];
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i<100;$i++){
        // $product = new Product();
            $genre = rand(1,2);
        $etudiant = new Etudiant();

        $etudiant ->setNom($faker->lastName());
        $etudiant->setPrenom($faker->firstName($sexeTab[$genre]));
        $etudiant->setSexe($genre);
        $etudiant->setAnniversaire(new \DateTime(datetime: '1951-05-21'));

            $manager->persist($etudiant);// persist = stocke dans l'ORM
        }
        $manager->flush();// flush = envoyer
    }

}
