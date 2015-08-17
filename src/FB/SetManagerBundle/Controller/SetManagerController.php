<?php
// src\FB\SetManagerBundle\Controller\SetManagerController.php

namespace FB\SetManagerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SetManagerController extends Controller
{
    public function indexAction()
    {
        // r�cup�ration de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // r�cup�ration de la liste des maillots stock�s en BDD
        $GameSets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();

        return $this->render('@FBSetManager/Set/index.html.twig', array('listGameSet' => $GameSets));
    }

    public function addAction()
    {

    }
}