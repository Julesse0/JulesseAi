<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++){
            $user = New User();
            $user->setEmail('a.a'.$i.'@gmail.com');
            $manager->persist($user);
        }

        $manager->flush();
    }
}