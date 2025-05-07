<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Create 30 fake projects
        for ($i = 0; $i < 30; $i++) {
            $clientRefIndex = rand(0, 9);
            $client = $this->getReference("client_$clientRefIndex", Client::class);

            $projet = new Projet();
            $projet->setClient($client);
            $projet->setName($faker->name());
            $projet->setDescription($faker->text());
            $projet->setStartDate($faker->dateTimeBetween('-1 year', 'now'));
            $projet->setEndDate($faker->dateTimeBetween('now', '+1 year'));
            $projet->setStatus($faker->randomElement(['pending', 'in_progress', 'completed']));
            $projet->setCreatedAt(new \DateTimeImmutable());
            $projet->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($projet);
        }

        $manager->flush();
    }
}
