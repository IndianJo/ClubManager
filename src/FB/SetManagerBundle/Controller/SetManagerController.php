<?php
// src\FB\SetManagerBundle\Controller\SetManagerController.php

namespace FB\SetManagerBundle\Controller;


use FB\SetManagerBundle\Entity\GameSet;
use FB\SetManagerBundle\Form\Type\GameSetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SetManagerController extends Controller
{
    public function indexAction(Request $request)
    {
        $gameSet = new GameSet();

        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

        // récupération de la liste des maillots stockés en BDD
        $GameSets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();

        // Création du formulaire
        $form = $this->get('form.factory')->create(new GameSetType(), $gameSet, array('attr' => $this->freeNumber() ));

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($gameSet);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info', 'jeu de maillot enregitré');

            //Clear the form
            unset($gameSet);
            unset($form);
            $gameSet = new GameSet();
            $form = $this->get('form.factory')->create(new GameSetType(), $gameSet);
        }

        return $this->render('@FBSetManager/Set/index.html.twig', array('listGameSet' => $GameSets,'form' => $form->createView()));
    }

    /**
     * @return array that contain available game set number
     */
    private function freeNumber()
    {
        $numbers = array();
        $freeNumber = array();
        for ($i = 1; $i<100; $i++){
            $numbers[$i] = $i;
        }

        foreach ($numbers as $number){
            $this->getDoctrine()->getManager()->getRepository('FBSetManagerBundle:GameSet')->findBy(
                array('number' => $number));
            if (!$this->getDoctrine()->getManager()->getRepository('FBSetManagerBundle:GameSet')->findBy(
                array('number' => $number))){
                array_push($freeNumber, $number);
            }
        }
        return $freeNumber;
    }
    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_MEMBER')")
     */
    public function updateAction(GameSet $gameSet, Request $request)
    {
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

            $this->get('session')->getFlashBag()->add('success', 'jeu de maillot mis à jour');

            // récupération des infos de la bases
            $gameSets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();
            //affichage de la liste des set de maillot
            return $this->redirect($this->generateUrl('fb_setmanager_home', array('listGameSet' => $gameSets)));
        }

        return $this->render('FBSetManagerBundle:Set:update.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Security("has_role('ROLE_MEMBER')")
     */
    public function deleteAction(GameSet $gameSet)
    {
        // Récupération du maillot
        $em = $this->getDoctrine()->getManager();

        // delete gameset
        $em->remove($gameSet);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success', 'jeu de maillot supprimer');

        // récupération des infos de la bases
        $gamesets = $em->getRepository('FBSetManagerBundle:GameSet')->findAll();
        //affichage de la liste des jeu de maillot
        return $this->redirect($this->generateUrl('fb_setmanager_home', array('listGameSet' => $gamesets)));
    }
}