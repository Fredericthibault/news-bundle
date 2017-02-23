<?php

namespace Viweb\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $news = $this->get('viweb.repository.news')->findAll();
        return $this->render('ViwebNewsBundle:Default:index.html.twig', [
            'news' => $news
        ]);
    }

    public function singleAction(Request $request, int $id)
    {
        $new = $this->get('viweb.repository.news')->find($id);
        return $this->render('ViwebNewsBundle:Default:single.html.twig', [
            'new' => $new
        ]);
    }

}
