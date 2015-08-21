<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 20/08/2015
 * Time: 15:27
 */

namespace FB\TournamentBundle\Controller;


use FB\TournamentBundle\Entity\Season;
use FB\TournamentBundle\Form\SeasonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SeasonController extends Controller
{
    public function indexAction()
    {

    }

    public function addAction(Request $request)
    {
        $season = new Season();

        // Création du formulaire de saisie
        $form = $this->get('form.factory')->create(new SeasonType(), $season);

        // On fait le lien Requête<->formulaire
        $form->handleRequest($request);

        // on vérife la validité des donnnées du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($season);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Saison enregitrée');

            //Clear the form
            unset($season);
            unset($form);
            $season = new Season();
            $form = $this->get('form.factory')->create(new SeasonType(), $season);
        }
        return $this->render('FBTournamentBundle:Season:add.html.twig', array('form' => $form->createView()));
    }

    public function updateAction($id, Request $request)
    {

    }

    public function deleteAction($id, Request $request)
    {

    }
}