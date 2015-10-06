<?php
// src\FB\PlayerManagerBundle\Controller\PlayerManagerController.php

namespace FB\PlayerManagerBundle\Controller;


use FB\PlayerManagerBundle\Entity\ThrowStat;
use FB\PlayerManagerBundle\Form\Type\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\BrowserKit\Response;
use FB\PlayerManagerBundle\Entity\Player;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class PlayerManagerController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // récupération de la liste des joueurs stockés en BDD
        $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAllPlayers();

        return $this->render('@FBPlayerManager/PlayerManager/index.html.twig', array('listPlayers' => $players));
    }

    /**
     * Use to add new player in database.
     * @Security("has_role('ROLE_MEMBER')")
     */
    public function addAction(Request $request)
    {
        $player = new Player();

        // Création du formulaire de saisie d'un nouveau joueur à partir du formBuilder
        $form = $this->get('form.factory')->create(new PlayerType, $player);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);
        
        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Joueur enregitré');

            //Clear the form
            unset($player);
            unset($form);
            $player = new Player();
            $form = $this->get('form.factory')->create(new PlayerType(), $player);

            if(isset($request->request->get('fb_playermanagerbundle_player')['saveexit'])){
                return $this->redirect($this->generateUrl('fb_playermanager_home'));
            }

        }
        return $this->render('FBPlayerManagerBundle:PlayerManager:add.html.twig', array('form' => $form->createView()));
    }

    /**
     * Use to delete player on database.
     * @Security("has_role('ROLE_MEMBER')")
     */
    public function deleteAction(Player $player)
    {
        // Récupération du joueurs
        $em = $this->getDoctrine()->getManager();

        // delete the player
        $em->remove($player);
        $em->flush();

        // récupération des infos de la bases
        $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();
        //affichage de la liste des joueurs
        return $this->redirect($this->generateUrl('fb_playermanager_home', array('listPlayers' => $players)));
    }

    /**
     * Use to update player on database.
     * @Security("has_role('ROLE_MEMBER')")
     */
    public function updateAction(Request $request, Player $player)
    {
        // Et on construit le formBuilder a partir de l'entité
        $form = $this->get('form.factory')->create(new PlayerType(), $player);

        $this->throwStatUpdate($request, $player);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Joueur mis à jour');

            // récupération des infos de la bases
            $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();
            //affichage de la liste des joueurs
            return $this->redirect($this->generateUrl('fb_playermanager_home', array('listPlayers' => $players)));
        }

        return $this->render('FBPlayerManagerBundle:PlayerManager:update.html.twig', array('form' => $form->createView()));
    }

    public function detailAction (Request $request, Player $player)
    {
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // récupération de la liste des joueurs stockés en BDD
        $throwDistances = $em->getRepository('FBPlayerManagerBundle:ThrowStat')->findBy(array('player' => $player->getId()));

        $label = array();
        $back = array();
        $side = array();
        foreach ($throwDistances as $throwDistance){
            $label[] = $throwDistance->getTestDate()->format('d-m-Y');
            $back[] = $throwDistance->getBackDistance();
            $side[] = $throwDistance->getSideDistance();
        }

        return $this->render('@FBPlayerManager/PlayerManager/detail.html.html.twig', array(
            'player' => $player,
            'throwDistances' => $throwDistances,
            'label' => $label,
            'back' => $back,
            'side' => $side));
    }

    /**
     * @param Request $request
     * @param Player $player
     */
    private function throwStatUpdate(Request &$request,Player $player)
    {
        //on récupère la liste des paramètres de la requête
        $parameters = $request->request->get('fb_playermanagerbundle_player');
        // on parcours la liste des paramètre pour mettre à jours l'id du joueur dans la stat de lancée
        if ($parameters['throwDistances'] != null) {
            foreach ($parameters['throwDistances'] as &$throwDistance) {
                $throwDistance['player'] = $player->getId();
            }
        }
        // mise a jours des paramères de la requêtes
        $request->request->set('fb_playermanagerbundle_player' ,$parameters);
    }
}
