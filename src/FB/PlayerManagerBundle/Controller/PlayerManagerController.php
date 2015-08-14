<?php
// src\FB\PlayerManagerBundle\Controller\PlayerManagerController.php

namespace FB\PlayerManagerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FB\PlayerManagerBundle\Entity\Player;
use Symfony\Component\HttpFoundation\Request;

class PlayerManagerController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // récupération de la liste des joueurs stckés en BDD
        $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();

        return $this->render('@FBPlayerManager/PlayerManager/index.html.twig', array('listPlayers' => $players));
    }

    /**
     * Use to add new player in database.
     */
    public function addAction(Request $request)
    {
        $player = new Player();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $player);

        $formBuilder
            ->add('firstname',      'text')
            ->add('lastname',       'text')
            ->add('phonenumber',    'number')
            ->add('street',         'text')
            ->add('streetnumber',   'number')
            ->add('city',           'text')
            ->add('cp',             'number')
            ->add('email',          'email')
            ->add('save',           'submit');


        $form = $formBuilder->getForm();
        return $this->render('FBPlayerManagerBundle:PlayerManager:add.html.twig', array('form' => $form->createView()));
    }
}