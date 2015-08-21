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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SeasonController extends Controller
{
    public function indexAction(Request $request)
    {
        $season = new Season();

        // Création du formulaire de saisie
        $form = $this->get('form.factory')->create(new SeasonType(), $season);

        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();

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

        // récupération de la liste des saisons stockés en BDD
        $seasons = $em->getRepository('FBTournamentBundle:Season')->findAll();

        return $this->render('FBTournamentBundle:Season:index.html.twig', array('listSeasons' => $seasons, 'form' => $form->createView()));
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
        // récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $season = $em->getRepository('FBTournamentBundle:Season')->find($id);

        if ($season === null)
            throw new NotFoundHttpException("La saison d'id".$id." n'existe pas");
        else
        {
            $form = $this->get('form.factory')->create(new SeasonType(), $season);
            $form->handleRequest($request);

            if ($form->isValid()){
                $em->persist($season);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Saison mis à jour');

                // récupération des infos de la bases
                $seasons = $em->getRepository('FBTournamentBundle:Season')->findAll();
                //affichage de la liste des set de maillot
                return $this->redirect($this->generateUrl('fb_season_home', array('listSeasons' => $seasons)));
            }
        }
        return $this->render('FBTournamentBundle:Season:update.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id, Request $request)
    {
        // Récupération de la saison
        $em = $this->getDoctrine()->getManager();
        $season = $em->getRepository('FBTournamentBundle:Season')->find($id);

        if ($season === null)
            throw new NotFoundHttpException("La saison d'id".$id." n'existe pas");

        // delete season
        $em->remove($season);
        $em->flush();

        // récupération des infos de la bases
        $seasons = $em->getRepository('FBTournamentBundle:Season')->findAll();
        //affichage de la liste des jeu de maillot
        return $this->redirect($this->generateUrl('fb_season_home', array('listSeasons' => $seasons)));
    }
}