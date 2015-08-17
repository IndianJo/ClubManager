<?php
// src\FB\PlayerManagerBundle\Controller\PlayerManagerController.php

namespace FB\PlayerManagerBundle\Controller;


use FB\PlayerManagerBundle\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\BrowserKit\Response;
use FB\PlayerManagerBundle\Entity\Player;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Use to add new player in database.
     */
    public function addAction(Request $request)
    {
        $player = new Player();

        // Cr�ation du formulaire de saisie d'un nouveau joueur � partir du formBuilder
        $form = $this->get('form.factory')->create(new PlayerType, $player);

        // On fait le lien Requ�te<->formulaire
        $form->handleRequest($request);

        // on v�rife la validit� des donnn�es du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Joueur enregitr�');
        }
        return $this->render('FBPlayerManagerBundle:PlayerManager:add.html.twig', array('form' => $form->createView()));
    }

    /**
     * Use to delete player on database.
     */
    public function deleteAction($id)
    {
        // R�cup�ration du joueurs
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository('FBPlayerManagerBundle:Player')->find($id);

        if ($player === null)
            throw new NotFoundHttpException("Le joueurs d'id".$id." n'existe pas");

        // delete the player
        $em->remove($player);
        $em->flush();

        // r�cup�ration des infos de la bases
        $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();
        //affichage de la liste des joueurs
        return $this->render('@FBPlayerManager/PlayerManager/index.html.twig', array('listPlayers' => $players));
    }

    /**
     * Use to update player on database.
     */
    public function updateAction(Request $request, $id)
    {
        // R�cup�ration du joueurs
        $player = $this->getDoctrine()->getManager()->getRepository('FBPlayerManagerBundle:Player')->find($id);

        // Et on construit le formBuilder avec cette instance de l'annonce, comme pr�c�demment
        $form = $this->get('form.factory')->create(new PlayerType, $player);

        // On fait le lien Requ�te<->formulaire
        $form->handleRequest($request);

        // on v�rife la validit� des donnn�es du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Joueur mis � jour');

            // r�cup�ration des infos de la bases
            $players = $em->getRepository('FBPlayerManagerBundle:Player')->findAll();
            //affichage de la liste des joueurs
            return $this->render('@FBPlayerManager/PlayerManager/index.html.twig', array('listPlayers' => $players));
        }

        return $this->render('FBPlayerManagerBundle:PlayerManager:update.html.twig', array('form' => $form->createView()));
    }
}