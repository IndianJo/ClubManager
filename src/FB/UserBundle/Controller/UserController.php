<?php

namespace FB\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('FBClubManagerBundle:ClubManager:index.html.twig');
    }
}