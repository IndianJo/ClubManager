<?php
// src\FB\ClubManagerBundle\DataFixtures\ORM\LoadPlayer.php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 11/08/2015
 * Time: 16:36
 */

namespace FB\PlayerManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FB\PlayerManagerBundle\Entity\Player;

class LoadPlayer implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Players = array(array());
        $Players[0][0] = "joseph";
        $Players[0][1] = "mesny";

        $Players[1][0] = "tommy";
        $Players[1][1] = "quirico";

        $Players[2][0] = "clementine";
        $Players[2][1] = "gamonet";

        $Players[3][0] = "colin";
        $Players[3][1] = "michoudet";


        foreach ($Players as $currentPlayer){
            $player = new player();
            $player->setFirstname($currentPlayer[0]);
            $player->setLastname($currentPlayer[1]);

            $manager->persist($player);
        }
        $manager->flush();
    }
}