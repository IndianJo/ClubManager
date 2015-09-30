<?php
# src\FB\ClubManagerBundle\Controller
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 07/08/2015
 * Time: 14:48
 */

namespace FB\ClubManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManagerController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
       return $this->render('FBClubManagerBundle:ClubManager:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function forumAction()
    {
        $this->get('session')->getFlashBag()->add('info', 'Le forum n\' est pas encore intégré');
        
        return $this->redirect($this->generateUrl('fb_clubmanager_home'));
    }
}
