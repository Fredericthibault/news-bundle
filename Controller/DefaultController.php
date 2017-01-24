<?php

namespace Viweb\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ViwebNewsBundle:Default:index.html.twig');
    }
}
