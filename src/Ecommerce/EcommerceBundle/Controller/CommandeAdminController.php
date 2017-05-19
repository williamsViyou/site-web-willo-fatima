<?php


namespace Ecommerce\EcommerceBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;


class CommandeAdminController extends Controller

{

    public function commandesAction() 

    {
 if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else{
        $em = $this->getDoctrine()->getManager();

        $commandes = $this->all_commande();
        $details = $this->fun1();
        $allusers = $this->all_user();

$x = array('commandes' => $commandes, 'details' =>$details, 'users' => $allusers);

        
 return $this->render('EcommerceEcommerceBundle:Administration:Commande/index.html.twig',$x);

    }}


    public function showFactureAction($id)
    { 
        if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {

        $em = $this->getDoctrine()->getManager();

        $facture = $this->uneFacture($id);
       { $details = $this->fun1();
        $allusers = $this->all_user();
        $produits = $this->all_produits();
         $categories= $em->getRepository('EcommerceEcommerceBundle:Categorie')->findAll();

        $x = array('facture' => $facture, 'details' =>$details, 'users' => $allusers, 'produits'=>$produits, 'categories' => $categories );}
        
       return $this->render('EcommerceEcommerceBundle:Administration:Commande/detail.html.twig',$x);
    }}


    
    public function all_commande()
    {

    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * from data_adrs"; 
$adr_database = $conn ->fetchAll($myquerystring_1);
return $adr_database;


    }

    public function fun1()
    {
          
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * FROM data d "; 
$adr_database = $conn ->fetchAll($myquerystring_1);
return $adr_database;

    }
    public function all_user()
    {
          
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * FROM user d "; 
$adr_database = $conn ->fetchAll($myquerystring_1);
return $adr_database;

    }
    public function uneFacture($id)
    {
        
          
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * FROM data d WHERE d._data_adrre = ";
$z_1 = " ".$id;
$myquerystring_1=$myquerystring_1.$z_1;
 
$adr_database = $conn ->fetchAll($myquerystring_1);
return $adr_database;

    }
   


 public function all_produits()
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * FROM produits p"; 
$adr_database = $conn ->fetchAll($myquerystring_1);
return $adr_database;


}





}