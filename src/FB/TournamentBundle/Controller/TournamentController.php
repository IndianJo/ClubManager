<?php
// \src\FB\TournamentBundle\Controller\TournamentController.php

namespace FB\TournamentBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TournamentController extends Controller
{
    public function indexAction()
    {

        return $this->render('FBTournamentBundle:Tournament:index.html.twig');
    }

}