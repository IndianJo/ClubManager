<?php
// src\FB\ClubManagerBundle\DataFixtures\ORM\LoadGameSet.php

namespace FB\ClubManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FB\SetManagerBundle\Entity\GameSet;

class LoadGameSet implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sets = array(array());
        $sets[0][0] = 87;
        $sets[0][1] = "M";
        $sets[0][2] = "M";

        $sets[1][0] = 22;
        $sets[1][1] = "XL";
        $sets[1][2] = "M";

        $sets[2][0] = 88;
        $sets[2][1] = "S";
        $sets[2][2] = "W";

        foreach ($sets as $set) {
            $gameset = new GameSet();
            $gameset->setNumber($set[0]);
            $gameset->setSize($set[1]);
            $gameset->setSexe($set[2]);

            $manager->persist($gameset);
        }
        $manager->flush();
    }
}