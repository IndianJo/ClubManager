<?php
# src\FB\ClubManagerBundle\Controller
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 07/08/2015
 * Time: 14:48
 */

namespace FB\ClubManagerBundle\Controller;

use Symfony\Component\BrowserKit\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ManagerController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
       return $this->render('FBClubManagerBundle:ClubManager:index.html.twig');
    }
}