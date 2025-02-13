<?php

namespace App\DataFixtures;

use App\Entity\Data;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $animes = [
            ["title" => "Shingeki no Kyojin", "traduction" => "L’Attaque des Titans"],
            ["title" => "Boku no Hero Academia", "traduction" => "Mon Héro Academia"],
            ["title" => "Kimetsu no Yaiba", "traduction" => "Les Tueurs de Démons"],
            ["title" => "One Piece", "traduction" => "Une Pièce"],
            ["title" => "Death Note", "traduction" => "Le Cahier de la Mort"],
            ["title" => "Naruto", "traduction" => "Tourbillon"],
            ["title" => "Steins;Gate", "traduction" => "La Porte de Stein"],
            ["title" => "Kuroko no Basket", "traduction" => "Le Panier de Kuroko"],
            ["title" => "Sword Art Online", "traduction" => "Art de l’Épée en Ligne"],
            ["title" => "Tokyo Ghoul", "traduction" => "Le Goule de Tokyo"]
        ];

        foreach ($animes as $animeData) {
            $data = new Data();
            $data->setAnime($animeData['title']);
            $data->setTraduction($animeData['traduction']);
            $manager->persist($data);
        }

        $manager->flush();
    }
}