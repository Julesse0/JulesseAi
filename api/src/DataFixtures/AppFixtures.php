<?php

namespace App\DataFixtures;

use App\Entity\Data;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $messages = [
            ["message" => "Bonjour, comment vas-tu ?", "response" => "Bonjour ! Je vais bien, merci et toi ?"],
        ];

        foreach ($messages as $chatData) {
            $data = new Data();
            $data->setMessage($chatData['message']);
            $data->setResponse($chatData['response']);
            $manager->persist($data);
        }

        $manager->flush();
    }
}
