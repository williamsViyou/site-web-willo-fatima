

<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\Session;

use Ecommerce\EcommerceBundle\Using\Linker\Mesure ;
use MyUser\UtilisateurBundle\Repository\ UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Query\ResultSetMapping;


class PanierController extends Controller 
{
/*
public function isPresent($tab, $id)
{
   // for($i = 0; $i<)
    {
        if($tab)



    }
}
*/
/*

Attempted to call an undefined method named "get" of class "MyUser\UtilisateurBundle\Entity\User".
Did you mean to call e.g. "getAdresse", "getCommande", "getConfirmationToken", "getEmail", "getEmailCanonical",
7 "getGroupNames", "getGroups", "getId", "getLastLogin", "getPanier", "getPassword", "getPasswordRequestedAt", 
"getPlainPassword", "getRoles", "getSalt", "getUsername" or "getUsernameCanonical"?


setConfirmationToken", "setEmail", "setEmailCanonical", "setEnabled", "setLastLogin", "setPanier", "setPassword", 
"setPasswordRequestedAt", "setPlainPassword", "setRoles", "setSalt", "setSuperAdmin", "setUsername" or "setUsernameCanonical"?
*/
    
       public function ajouteProduitAction($id, $quantity = 1, $x = false )
    {
        

             var_dump($this->getUser()->getId());  
        $user = $this->getUser()->getId();
        $user_panier = $this->monPanier2($user);
        $length = count($user_panier);
                  
    
        if(empty($user_panier))
        {
            
       
              $this->insert_Produi_in_Panier($quantity,$user, $id);
                               
                $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
            
        }
        
        else{              
  
                for($i = 0; $i < $length ; $i++)
                    {      
                        $index = (intval($user_panier[$i]['id_produit'])) ;

                        $y=$i;
                        var_dump($index == intval($id));            
                        if(($index === intval($id)));
                        {
                         //   var_dump($i); var_dump(intval($user_panier[$i]['id_produit']));
         
                          if(($index === intval($id)) && ($x == false) ) $x = true ;
                     

                         $this->miseAjourPanierProdui(1000,$user, $id);
                            
                         $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
                
             
                        }
                    }

                   
                    if($x == false)
                    {

                    $a= $this->insert_Produi_in_Panier($quantity,$user, $id);

                    $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
            
                    }



                        
            }


/*Did you mean to call e.g. "fetchAll", "fetchArray", "fetchAssoc" or "fetchColumn"?*/
/**/
       // $em = $this->getDoctrine()->getManager();
        //        $user_bd = $em->getRepository('MyUserUtilisateurBundle:User')->find(6);
        //$user_panier_final = $this->getUser()->getPanier();



/*Attempted to call an undefined method named "execute" of class "Doctrine\DBAL\Connection".
Did you mean to call e.g. "executeCacheQuery", "executeQuery" or "executeUpdate"?*/

/*$user_database = $this->getUserQuery($user);
$po = $this->UpdateUser_Panier_Query($user, $user_panier);
//$p = $this->f($user_panier, $user);
$p = $this->f1(1);*/

                var_dump( $this->monPanier2($user) );      
    return $this->redirect($this->generateUrl('panier'));  
}

public function supprimerAction($id)
    {



                 var_dump($this->getUser()->getId());  
        $user = $this->getUser()->getId();
    
    
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');
        
        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }
        
        return $this->redirect($this->generateUrl('panier')); 
    }
    



     public function panierAction()
    {
                $user = $this->getUser()->getId();
        $user_panier = $this->getUser()->getPanier();

var_dump(    $user_panier);
die();

        $s = new Session();

 $request = Request::createFromGlobals();
        //var_dump($session);
       
//var_dump($session);
        if (!$request->server->has('panier')) { 
         //   $session['panier'] = array(); 
             $request->server->set('panier',array()); 
            }
//var_dump($session);
          $em = $this->getDoctrine()->getManager();              
        $produits = $em->getRepository('EcommerceEcommerceBundle:Produits')->findArray(array_keys($request->server->get('panier')));
       $xx = array_keys($request->server->get('panier'));
//var_dump($request->server);

    
            $session = $request->server;       

               
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/panier.html.twig', array('produits' => $produits,
                                                                                            'panier' =>$request->server->get('panier')));
   }




public function monPanier2($user)
{
    

$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ');

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring = 'SELECT DISTINCT p.id, p.quantite, p.id_produit, p.id_user FROM panier_user p , user u WHERE p.id_user = ' ; 
$z = $user." ";
$myquerystring=$myquerystring.$z;

$user_database = $conn ->fetchAll($myquerystring);

return $user_database;



}

public function f($array ,$id)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$xx = array(); 
$params = array($xx, 2);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}

public function miseAjourPanierProdui($quantity,$iduser, $produit)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "UPDATE `panier_user`  SET `quantite`= ? WHERE id_user = ? and id_produit = ?";
 
//$xx = array(); 
$params = array($quantity, $iduser, $produit);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}

public function insert_Produi_in_Panier($quantity,$iduser, $produit)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "INSERT INTO `panier_user` (`id`, `id_user`, `quantite`, `id_produit`) VALUES (NULL, ?, ?, ?)";
//$xx = array(); 
$params = array ($iduser, $quantity, $produit);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}


public function delete_Produi_in_Panier($id_panier)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "DELETE FROM `panier_user` WHERE id = ?";
//$xx = array(); 
$params = array ($id_panier);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}

public function UpdateUser_Panier_Query($user, $panier_new)
{
    //UPDATE `user` SET `username`= 'tata' WHERE id = 6 ;

/*

UPDATE `user` SET `username`= tata,`username_canonical`=[value-3],`email`=[value-4],
`email_canonical`=[value-5],`enabled`=[value-6],`salt`=[value-7],`password`=[value-8],
`last_login`=[value-9],`confirmation_token`=[value-10],`password_requested_at`=[value-11],
`roles`=[value-12],`panier`=[value-13] WHERE 1
/**

*/
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'UPDATE `user` SET `panier`' ; 
$z_1 = " ";
$myquerystring_1=$myquerystring_1.$z_1;

$myquerystring_2 = 'WHERE id = ';
$z_2 = $user." ";
$myquerystring_2=$myquerystring_2.$z_2;

$myquerystring_final = $myquerystring_1.$myquerystring_2;

//$user_database = $conn ->fetchAll($myquerystring);

return $myquerystring_final;



}








 //https://github.com/symfony/symfony/blob/master/UPGRADE-3.0.md







    
    public function myajouterAction($id)
    {
 $request = Request::createFromGlobals();
$s = new Session();

   
if(!$s->has('panier'))
{
    $s->set('panier',array());

}
$panier = $s->get('panier');
if (array_key_exists($id, $panier)) {
            if ( $request->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
        } 
        else {
            if ( $request->query->get('qte') != null)
                $panier[$id] = $this->getRequest()->query->get('qte');
            else
                $panier[$id] = 1;
            
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
          
        
        }


      $s->set('panier',$panier);
     
     var_dump($s);
    
    $mycache= $panier ; 

       return $this->redirect($this->generateUrl('panier'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function mypanierAction()
    {
            
 $request = Request::createFromGlobals();
      //var_dump($request);
            $session = $request->server;
        //var_dump($session);
       
//var_dump($session);
        if (!$request->server->has('panier')) { 
         //   $session['panier'] = array(); 
             $request->server->set('panier',array()); 
            }


//var_dump($session);
          $em = $this->getDoctrine()->getManager();
           

               
        $produits = $em->getRepository('EcommerceEcommerceBundle:Produits')->findArray(array_keys($request->server->get('panier')));
       $xx = array_keys($request->server->get('panier'));
//var_dump($request->server);


var_dump($s);
die();
               
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/panier.html.twig', array('produits' => $produits,
                                                                                             'panier' =>$request->server->get('panier')));
    }
    





    public function livraisonAction()
    {
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/livraison.html.twig');
    }
    
    public function validationAction()
    {
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/validation.html.twig');
    }
    

    public function linked($mavar)
    {

var_dump(($mavar));
die();
    } 
    public function ajouterAction($id)
    {

       // $request = new Request ();
      
      $request = Request::createFromGlobals();
    //  var_dump($request);
            $session = $request->server;
     //   var_dump($session);
                
     // var_dump($session);   
        if (!$request->server->has('panier'))
         {
            // $session['panier'] = array();
           $request->server->set('panier',array()); 
           
//var_dump($request);//OK

        }


       // $panier = $session->get('panier');
         $panier = $request->server->get('panier');
       // $panier = $session['panier'];

   
    //var_dump($panier); //=> si c'es la premiere foi suis avec un array {0}'  
    
 

        if (array_key_exists($id, $panier)) {
            if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
      
        } 
        else {


                    if ( $request->query->get('qte') != null)
                    {
                  $panier[$id] = $this->getRequest()->query->get('qte');
                    }
                
                    else
    {       $panier[$id] = 1;
                    
                    $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');           
                }
                
            }

            $request->server->set('panier',$panier); 
            

                               
       return $this->redirect($this->generateUrl('panier'));
    }
    

    
}
