<?php



namespace Ecommerce\EcommerceBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ecommerce\EcommerceBundle\Entity\Produits;

use Ecommerce\EcommerceBundle\Form\testType;

use  Ecommerce\EcommerceBundle\Entity\Categorie;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TestController extends Controller

{



  public function testFormulaireAction() 
  {

    
        $Categorie2= new Categorie();
        $Categorie2-> setNom('BMW ligth air');   
        $Categorie2->setImageId((1));
        die('111' + $this->getReference('media5')); 
       
         
        $manager->persist($Categorie2);
        


        $manager->flush();

        
      
/*
      $x = 1 ; 
      $form = $this->createForm(testType::class, $x);

      $formView =  $form->createView();

   return $this->render('EcommerceBundle:Default:test.html.twig', array('form' => $formView));*/



  }





}

