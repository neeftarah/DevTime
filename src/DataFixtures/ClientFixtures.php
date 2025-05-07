<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Create 10 fake clients
        for ($i = 0; $i < 10; $i++) {
            $client = new Client();
            $client->setName($faker->name());
            $client->setEmail($faker->email());
            $client->setCompanyName($faker->company());
            $client->setCreatedAt(new \DateTimeImmutable());
            $client->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($client);

            // 🔑 Ajout de référence
            $this->addReference("client_$i", $client);
        }

        $manager->flush();
    }
}
