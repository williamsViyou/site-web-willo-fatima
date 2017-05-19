<?php

namespace MyUser\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyUserUtilisateurBundle:Default:index.html.twig');
    }
}
