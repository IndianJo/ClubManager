<?php
// \src\FB\TournamentBundle\Controller\TournamentController.php

namespace FB\TournamentBundle\Controller;


use FB\TournamentBundle\Entity\Tournament;
use FB\TournamentBundle\Form\TournamentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TournamentController extends Controller
{
    public function indexAction()
    {
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // récupération de la liste des tournois stockés en BDD
        $tournaments = $em->getRepository('FBTournamentBundle:Tournament')->findAll();
        return $this->render('FBTournamentBundle:Tournament:index.html.twig', array('listTournament' => $tournaments));
    }

    public function addAction(Request $request)
    {
        $tournament = new Tournament();

        // Création du formulaire de saisie
        $form = $this->get('form.factory')->create(new TournamentType(), $tournament);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($tournament);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Tournoi enregitré');
        }
        return $this->render('FBTournamentBundle:Tournament:add.html.twig', array('form' => $form->createView()));
    }

    public function updateAction($id, Request $request)
    {
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $tournament = $em->getRepository('FBTournamentBundle:Tournament')->find($id);
        //$gameSet = $this->getDoctrine()->getManager()->getRepository('FBSetManagerBundle:GameSet')->find($id);

        if ($tournament === null)
            throw new NotFoundHttpException("Le tournoi d'id".$id." n'existe pas");
        else
        {
            $form = $this->get('form.factory')->create(new TournamentType(), $tournament);
            $form->handleRequest($request);

            if ($form->isValid()){
                $em->persist($tournament);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Tournoi mis à jour');

                // récupération des infos de la bases
                $tournaments = $em->getRepository('FBTournamentBundle:Tournament')->findAll();
                //affichage de la liste des set de maillot
                return $this->render('FBTournamentBundle:Tournament:index.html.twig', array('listTournament' => $tournaments));
            }
        }
        return $this->render('FBTournamentBundle:Tournament:update.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id)
    {

    }

}