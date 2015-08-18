<?php
// src\FB\SetManagerBundle\Controller\SetManagerController.php

namespace FB\SetManagerBundle\Controller;


use FB\SetManagerBundle\Entity\GameSet;
use FB\SetManagerBundle\Form\GameSetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SetManagerController extends Controller
{
    public function indexAction()
    {
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // récupération de la liste des maillots stockés en BDD
        $GameSets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();

        return $this->render('@FBSetManager/Set/index.html.twig', array('listGameSet' => $GameSets));
    }

    public function addAction(Request $request)
    {
        $gameSet = new GameSet();

        // Création du formulaire de saisie d'un nouveau joueur à partir du formBuilder
        $form = $this->get('form.factory')->create(new GameSetType(), $gameSet);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($gameSet);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'GameSet enregitré');
        }
        return $this->render('FBSetManagerBundle:Set:add.html.twig', array('form' => $form->createView()));
    }

    public function updateAction($id, Request $request)
    {
        // Récupération du jeu de maillot
        $gameSet = $this->getDoctrine()->getManager()->getRepository('FBSetManagerBundle:GameSet')->find($id);

        // Et on construit le formBuilder
        $form = $this->get('form.factory')->create(new GameSetType(), $gameSet);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($gameSet);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'jeu de maillot mis à jour');

            // récupération des infos de la bases
            $gameSets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();
            //affichage de la liste des set de maillot
            return $this->render('FBSetManagerBundle:Set:index.html.twig', array('listGameSet' => $gameSets));
        }

        return $this->render('FBSetManagerBundle:Set:update.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id)
    {
        // Récupération du maillot
        $em = $this->getDoctrine()->getManager();
        $gameset = $em->getRepository('FBSetManagerBundle:GameSet')->find($id);

        if ($gameset === null)
            throw new NotFoundHttpException("Le set de maillot d'id".$id." n'existe pas");

        // delete gameset
        $em->remove($gameset);
        $em->flush();

        // récupération des infos de la bases
        $gamesets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();
        //affichage de la liste des jeu de maillot
        return $this->render('@FBSetManager/Set/index.html.twig', array('listGameSet' => $gamesets));
    }
}