<?php
// src\FB\SessionManagerBundle\Controller\PlayerManagerController.php

namespace FB\SessionManagerBundle\Controller;


use FB\SessionManagerBundle\Form\SessionType;
use FB\SessionManagerBundle\Entity\Session;
use FB\SessionManagerBundle\Form\TeamType;
use FB\TournamentBundle\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SessionManagerController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('FBClubManagerBundle:ClubManager:index.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $session = new Session();

        // Création du formulaire de saisie
        $form = $this->get('form.factory')->create(new SessionType(), $session);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            //on ajoute la team "non-joueur"
            $team = new Team();
            $team->setName('Non-joueurs');
            $session->addTeam($team);

            //Calcul du détail de la séance
            $this->setTrainingSchedule($session);

            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Séance enregitré');

            // L'utilisateur est renvoyé vers la page d'update de la séance pour pouvoir créer / ajouter les équipes
            return $this->redirect($this->generateUrl('fb_session_update', array('id' => $session->getId())));
        }

        return $this->render('FBSessionManagerBundle:SessionManager:add.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param Session $session
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Session $session)
    {
        return $this->render('FBSessionManagerBundle:SessionManager:detail.html.twig', array('session' => $session));
    }

    /**
     * @param Request $request
     * @param Session $session
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, Session $session)
    {
        $form = $this->get('form.factory')->create(new SessionType(), $session);

        $this->teamUpdate($request, $session);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            //set the training time
            $this->setTrainingSchedule($session);

            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'séance mise à jour');

            //affichage de la liste des joueurs
            return $this->redirect($this->generateUrl('fb_session_detail', array('id' => $session->getId())));
        }
        return $this->render('FBSessionManagerBundle:SessionManager:update.html.twig', array('form' => $form->createView(), 'session' => $session));
    }

    public function addTeamAction(Request $request)
    {
        $team = new Team();

        // Création du formulaire de saisie
        $form = $this->get('form.factory')->create(new TeamType(), $team);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){

            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Equipe enregitré');
        }

        return $this->render('FBSessionManagerBundle:Team:add.html.twig', array('form' => $form->createView()));
    }

    public function updateTeamAction(Request  $request, Team $team)
    {
        $form = $this->get('form.factory')->create(new TeamType(), $team);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'équipe mise à jour');
        }
        return $this->render('FBSessionManagerBundle:Team:update.html.twig', array('form' => $form->createView()));
    }
    /**
     * @param Session $session
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Session $session)
    {
        return $this->render('FBTournamentBundle:Tournament:calendar.html.twig');
    }

    /**
     * use to auto update team session link in case of add or update team for a session
     * @param Request $request
     * @param Session $session
     */
    private function teamUpdate(Request &$request,Session $session)
    {
        $findTeam = false;
        //on récupère la liste des paramètres de la requête
        $parameters = $request->request->get('fb_sessionmanagerbundle_session');

        if ($parameters['teams'] != null) {
/*            // on compare la liste des équipes du formulaire avec celle de la base afin de supprimer les équipes en trop.
            foreach ($session->getTeams() as &$sTeam)
            {
                foreach ($parameters['teams'] as &$team) {
                    if ($sTeam->getId() == $team['id'])
                        $findTeam = true;
                }
                if (!$findTeam)
                    $sTeam = null;
            }*/
            // on parcours la liste des paramètre pour mettre à jour l'id de la session des équipes
            foreach ($parameters['teams'] as &$team) {
                $team['session'] = $session->getId();
            }
            // mise a jours des paramères de la requêtes
            $request->request->set('fb_sessionmanagerbundle_session' ,$parameters);
        }
    }

    /**
     * Use to automatically set the start and end training time according to the training day.
     * @param $session
     */
    private function setTrainingSchedule($session)
    {
        // on déduis les horaires d'entrainement en fonction du jours.
        $date = $session->getTrainingStart()->format('Y-m-d');
        $sessionDay = date('l', strtotime($date));
        $start = date_create($date);
        $end = date_create($date);
        if ($sessionDay == 'Thursday') {
            $start->setTime(21, 00, 00);
            $end->setTime(22, 30, 00);
            $session->setSurface('Indoor');
        } else {
            $start->setTime(20, 00, 00);
            $end->setTime(22, 00, 00);
            $session->setSurface('Outdoor');
        }
        $session->setTrainingStart($start);
        $session->setTrainingEnd($end);
    }

}