<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Form\RechercheRType;

 use Ecommerce\EcommerceBundle\Twig\Extension\TvaExtension ;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{



      public function acceuilAction()
    {
        return $this->render('EcommerceEcommerceBundle:Default:Produits/layout/acc.html.twig');
    }



      public function produitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $findproduits = $em->getRepository('EcommerceEcommerceBundle:Produits')->findAll();
        $medias= $em->getRepository('EcommerceEcommerceBundle:media')->findAll();
        $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
 
 $request = Request::createFromGlobals();
$produits = $this->get('knp_paginator')->paginate($findproduits,$request->query->get('page', 1),3);
        

        $x = array  ("produits" => $produits , "medias" => $medias, "Tva" => $tva );
      
        return $this->render('EcommerceEcommerceBundle:Default:Produits/layout/produit.html.twig', $x);
    }
        
  /*   public function presentationAction()
    {
        return $this->render('EcommerceEcommerceBundle:Default:Produits/layout/presentation.html.twig');
    }
    */
 public function categorieAction($idcategorie)
    {
        $em = $this->getDoctrine()->getManager();
        $findproduits = $em->getRepository('EcommerceEcommerceBundle:Produits')->byCategorie($idcategorie);
        $categorie = $em->getRepository('EcommerceEcommerceBundle:Categorie')->find($idcategorie);
        if (!$categorie) throw $this->createNotFoundException('La page n\'existe pas.');
        
        $medias= $em->getRepository('EcommerceEcommerceBundle:media')->findAll();


        $request = Request::createFromGlobals();
        $produits = $this->get('knp_paginator')->paginate($findproduits,$request->query->get('page', 1),3);


         $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
        $x = array  ("produits" => $produits , "medias" => $medias , "Tva" => $tva );
      
        return $this->render('EcommerceEcommerceBundle:Default:Produits/layout/produit.html.twig', $x);
    }

        public function presentationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceEcommerceBundle:Produits')->find($id);
        $medias= $em->getRepository('EcommerceEcommerceBundle:media')->findAll();
        $categories= $em->getRepository('EcommerceEcommerceBundle:Categorie')->findAll();

        $produitalpha = $em->getRepository('EcommerceEcommerceBundle:Produits')->find($id);
        if (!$produitalpha) throw $this->createNotFoundException('La page n\'existe pas.');
        
        $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();

        $x = array  ("produit" => $produit , "medias" => $medias, "categories" => $categories, "Tva" => $tva );
      
        return $this->render('EcommerceEcommerceBundle:Default:produits/layout/presentation.html.twig',$x);
    }






     public function rechercheAction() 
    {    

$x = new RechercheRType();
               
        $form = $this->createForm(  'Symfony\Component\Form\Extension\Core\Type\FormType', new RechercheRType());
       
        return $this->render('EcommerceEcommerceBundle:Default:Recherche/modulesUsed/recherche.html.twig', array('form' => $form->createView(), "label" => false,
                                                'attr' => array('class' => 'input-medium search-query')));
    }
    

    public function funRecherche($search)
    {
            
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM produits p WHERE p.nom LIKE' ; 
$z_1 = " '%".$search;
$myquerystring_1=$myquerystring_1.$z_1;

$myquerystring_1 = $myquerystring_1."%'";

$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;
    }
    public function rechercheTraitementAction() 
    {
       // $form = $this->createForm(new RechercheType());
        
          $em = $this->getDoctrine()->getManager();
        
      
          $medias= $em->getRepository('EcommerceEcommerceBundle:media')->findAll();
 //     echo($_GET['search_query']);

 $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();

               $findproduits = $this->funRecherche($_GET['search_query']);
 $request = Request::createFromGlobals();
          $produits = $this->get('knp_paginator')->paginate($findproduits,$request->query->get('page', 1),3);


         $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
        $x = array  ("produits" => $produits , "medias" => $medias , "Tva" => $tva );
       
        
        return $this->render('EcommerceEcommerceBundle:Default:Produits/layout/produit.html.twig', $x);
  }
}
