<?php
// src\FB\SessionManagerBundle\Controller\PlayerManagerController.php

namespace FB\SessionManagerBundle\Controller;


use FB\SessionManagerBundle\Form\SessionType;
use FB\SessionManagerBundle\Entity\Session;
use FB\TournamentBundle\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SessionManagerController extends Controller
{
    public function indexAction()
    {
        return $this->render('FBClubManagerBundle:ClubManager:index.html.twig');
    }

    public function addAction(Request $request)
    {
        $session = new Session();
        $team = new Team();
        $team->setName('Exterieur');
        $session->addTeam($team);

        // Création du formulaire de saisie
        $form = $this->get('form.factory')->create(new SessionType(), $session);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){

            // on déduis les horaires d'entrainement en fonction du jours.
            $sessionDay = date("w", $session->getTrainingStart());
            $start  = $session->getTrainingStart();
            $end = $start;
            if ($sessionDay == 4){
                $start->setTime(21,00,00);
                $end->setTime(22,30,00);
                $session->setSurface('Indoor');
            }else{
                $start->setTime(20,00,00);
                $end->setTime(22,00,00);
                $session->setSurface('Outdoor');
            }
            $session->setTrainingStart($start);
            $session->setTrainingEnd($end);

            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Séance enregitré');

            //Clear the form
            unset($session);
            unset($form);

            $session = new Session();
            $team = new Team();
            $team->setName('Exterieur');
            $session->addTeam($team);

            $form = $this->get('form.factory')->create(new SessionType(), $session);
        }

        return $this->render('FBSessionManagerBundle:SessionManager:add.html.twig', array('form' => $form->createView()));
    }
}