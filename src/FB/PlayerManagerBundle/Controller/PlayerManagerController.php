<?php
// src\FB\PlayerManagerBundle\Controller\PlayerManagerController.php

namespace FB\PlayerManagerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FB\PlayerManagerBundle\Enitty;

class PlayerManagerController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        // r�cup�ration de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // r�cup�ration de la liste des joueurs stck�s en BDD
        $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();

        return $this->render('@FBPlayerManager/PlayerManager/index.html.twig', array('listPlayers' => $players));
    }

    /**
     * @summary Use to add new player in database.
     */
    public function addAction()
    {

    }
}