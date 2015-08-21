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

        // Cr�ation du formulaire de saisie
        $form = $this->get('form.factory')->create(new SeasonType(), $season);

        // On fait le lien Requ�te<->formulaire
        $form->handleRequest($request);

        // on v�rife la validit� des donnn�es du formulaire
        if($form->isValid()){
            // sauvegarde dans la BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($season);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Saison enregitr�e');

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