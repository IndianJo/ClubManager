<?php

namespace FB\SetManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FBSetManagerBundle:Default:index.html.twig', array('name' => $name));
    }
}
