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
        $sets[0][2] = "Men";

        $sets[1][0] = 22;
        $sets[1][1] = "XL";
        $sets[1][2] = "Men";

        $sets[2][0] = 88;
        $sets[2][1] = "S";
        $sets[2][2] = "Women";

        foreach ($sets as $set) {
            $gameSet = new GameSet();
            $gameSet->setNumber($set[0]);
            $gameSet->setSize($set[1]);
            $gameSet->setSexe($set[2]);

            $manager->persist($gameSet);
        }
        $manager->flush();
    }
}