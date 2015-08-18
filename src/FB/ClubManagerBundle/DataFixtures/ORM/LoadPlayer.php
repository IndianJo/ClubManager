<?php
// src\FB\ClubManagerBundle\DataFixtures\ORM\LoadPlayer.php

namespace FB\ClubManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FB\PlayerManagerBundle\Entity\Player;

class LoadPlayer implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $players = array(array());
        $players[0][0] = "joseph";
        $players[0][1] = "mesny";
        $players[0][2] = 06;
        $players[0][3] = "rue du poitout";
        $players[0][4] = "joseph.mesny@ucv.com";

        $players[1][0] = "tommy";
        $players[1][1] = "quirico";
        $players[1][2] = 0606060606;
        $players[1][3] = "rue du poitout";
        $players[1][4] = "tommy.quirico@ucv.com";

        $players[2][0] = "clementine";
        $players[2][1] = "gamonet";
        $players[2][2] = 0606060606;
        $players[2][3] = "rue du poitout";
        $players[2][4] = "clementine.gamonet@ucv.com";

        $players[3][0] = "colin";
        $players[3][1] = "michoudet";
        $players[3][2] = 0606060606;
        $players[3][3] = "rue du poitout";
        $players[3][4] = "colin.michoudet@ucv.com";

        $players[4][0] = "gaetan";
        $players[4][1] = "masson";
        $players[4][2] = 0606060606;
        $players[4][3] = "rue du poitout";
        $players[4][4] = "gaetan.masson@ucv.com";

        foreach ($players as $currentPlayer){
            $player = new player();
            $player->setFirstname($currentPlayer[0]);
            $player->setLastname($currentPlayer[1]);
            $player->setPhonenumber($currentPlayer[2]);
            $player->setStreet($currentPlayer[3]);
            $player->setEmail($currentPlayer[4]);

            $manager->persist($player);
        }
        $manager->flush();
    }
}