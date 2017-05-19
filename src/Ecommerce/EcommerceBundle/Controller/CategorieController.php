<?php

 namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class CategorieController extends Controller
{
    /*public function pageAction($num_page)
    {
        return $this->render('PagesPagesBundle:Default/pages/layout:pages.html.twig', array ('num_page' => $num_page));
    }*/

    

       public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cate = $em->getRepository('EcommerceEcommerceBundle:Categorie')->findAll();

        

        return $this->render('::ModelUsed/menuCategorie.html.twig', array('categories' => $cate));
    }

     public function pageAction($num_page)
    {
        $em = $this->getDoctrine()->getManager();

        $pages = $em->getRepository('PagesPagesBundle:Page')->find($num_page);

        if (!$pages) throw $this->createNotFoundException('La page n\'existe pas.');

 return $this->render('PagesPagesBundle:Default/pages/layout:pages.html.twig',  array('pages' => $pages , 'id_page' => $num_page));
    }
}

