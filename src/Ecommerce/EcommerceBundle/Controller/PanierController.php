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

public function catchAction($id){
     
        var_dump(($quantity));
        var_dump(($_GET["HTTP_REFERER"]));
        
die();
}



  public function ajouteProduit2Action($id, $quantity = 1, $x = false )
    { $lol = 0;
        $tab = $_SERVER["HTTP_REFERER"] ; 
var_dump(($_SERVER["HTTP_REFERER"]));
        for( $i = 0 ; $i < strlen($tab) ;$i++ )
        {
            if(strcmp($tab[$i] ,"qte"))
             {
                 $lol = $tab[$i];
             }
        }
        var_dump($lol);
$q = intval($lol);
       
        
        //     if( (isset($_GET['qte']) && (empty($_GET)==false) ) )
             {
             $produit = intval($id);
         //    $q = intval($_GET['qte']);
        //     $quantity = $_GET['qte'];
           
             }

          return $this ->  ajouteProduitAction($produit, $q);
    }
    
       public function ajouteProduitAction($id, $quantity = 1, $x = false )
    {
             //var_dump( $quantity );
             
             
        var_dump(empty($_GET));

        if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
         //    var_dump($this->getUser()->getId());  
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
                       // var_dump($index == intval($id));            
                        if(($index === intval($id)));
                        {
                         //   var_dump($i); var_dump(intval($user_panier[$i]['id_produit']));
         
                          if(($index === intval($id)) && ($x == false) ) $x = true ;

                $this->miseAjourPanierProdui($quantity,$user, $id);
                
                     
                         $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
             
                        }
  

                    }

                   
                    if($x == false)
                    {
  
             $a= $this->insert_Produi_in_Panier($quantity,$user, $id);

                    $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');
                      $this->get('session')->getFlashBag()->add('success','Quantité modifié avec succès');
     

             
                    }


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
           
//
           //     var_dump( $this->monPanier2($user) );      
   
            return $this->redirect($this->generateUrl('panier'));  
}





public function supprimerAction($id)
    {


        if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {

                 var_dump($this->getUser()->getId());  
        $user = $this->getUser()->getId();
        if ($user != null)
        {
            $this->delete_Produi_in_Panier($id);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }
        else
        {
            echo('Cette action nécessite une connextion à un compte utilisateur') ;

        }
        }
        return $this->redirect($this->generateUrl('panier')); 
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







    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

 public function pre_livraisonAction($id1, $id2)
    {  if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {

            
                    
        $a=$this->all_adresse($this->getUser()->getId());
        $x = array  ("adr" => $a);
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/livraison.html.twig', $x);
    }}




    public function livraisonAction()
    
    {
        
          if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {

            
                  
        $a=$this->all_adresse($this->getUser()->getId());
        $x = array  ("adr" => $a);
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/livraison.html.twig', $x);
    }}
    
    public function validationAction()

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
             $user = $this->getUser()->getId();
             $produits = $this->requete1($user);
             $user_panier = $this->monPanier2($user); 
             $livraison = $this->livraison($user);
             $findfacturation = $this->facturation($user);
             $request = Request::createFromGlobals();
             $facturation = $this->get('knp_paginator')->paginate($findfacturation,$request->query->get('page', 1),5);
             $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
             $x = array('id_user' => $user,
                        'produits' => $produits,
                        'panier' => $user_panier,
                        'livraison' => $livraison,
                        'facturation' => $facturation,
                        'tva' => $tva) ;
        //    var_dump($produits);
             
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/validation.html.twig', $x );
    }}
    

    public function panierAction()
    {
       
        if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {

        $user = $this->getUser()->getId();
        $user_panier = $this->monPanier2($user); 
        
        $em = $this->getDoctrine()->getManager();
        $produits = $this->requete1($user);
       
        $medias= $em->getRepository('EcommerceEcommerceBundle:media')->findAll();
        $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
       

        $x = array  ("produits" => $produits , "tva" => $tva, "panier" => $user_panier );
     //   var_dump($user_panier);
       // echo("////////////////////////////////////////////////////////////////////////////////////////////////////////////////////");
              //   var_dump($user_panier);
       // var_dump($this->user_produi_inPanier($user_panier));
    //    $my_product = $this->user_produi_inPanier($user_panier);
        
        return $this->render('EcommerceEcommerceBundle:Default:panier/layout/panier.html.twig',$x);
        }
    }
    

public function requete1($id_element)
{

$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = ' SELECT * FROM produits u, panier_user p WHERE p.id_produit = u.id and p.id_user =' ; 
$z_1 = " ".$id_element;
$myquerystring_1=$myquerystring_1.$z_1;

$produit_database = $conn ->fetchAll($myquerystring_1);

return $produit_database;



}
    public function user_produi_inPanier($panier)
    {

        $result = array();
        $length = count($panier);
        for( $i = 0; $i < $length; $i++)
        {
            $result[] = $this->requete1($panier[$i]["id_produit"]);
        }
        return $result ;
    }


public function panier_to_produit($id_element)
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM `produits` WHERE id = ' ; 
$z_1 = " ".$id_element;
$myquerystring_1=$myquerystring_1.$z_1;

$produit_database = $conn ->fetchAll($myquerystring_1);

return $produit_database;


}
    public function  newAdresseAction()
{
    $x1 = $_POST['nom'];
    
    $x2 = $_POST['prenom'];
    
    $x3 = $_POST['addresse'];
    
    $x4 = $_POST['complement'];
    
    $x5 = $_POST['ville'];
    
    $x6 = intval($_POST['cp']);

    $x7 = intval($_POST['tel']);
   
    $x8 = $_POST['pays'];

if((is_integer($x7) && (is_integer($x6)) ))
{
$user = $this->getUser()->getId();
$user_panier = $this->monPanier2($user);
$result = $this->add_new_adresse($x1, $x2,$user, $x3, $x4, $x5, $x8, $x6, $x7);

$a=$this->all_adresse($user);
$x = array  ("adr" => $a);
 return $this->redirect($this->generateUrl('livraison')); 
//return $this->render('EcommerceEcommerceBundle:Default:panier/layout/livraison.html.twig',$x);
}


}







public function all_adresse($iduser)
{
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM `utilisateur_adresse` WHERE id_User = ' ; 
$z_1 = " ".$iduser;
$myquerystring_1=$myquerystring_1.$z_1;

$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;
}





public function add_new_adresse($nom, $prenom, $u, $adrs, $com, $vil, $pa, $cp, $tel)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "INSERT INTO `utilisateur_adresse`( `nom`, `prenom`, `id_User`, `Adresse`, `Complement`, `Ville`, `Pays`, `CodePostal`, `Tel`) values (?, ?, ?, ?, ?, ?,?, ?, ?)";
//$xx = array(); 
$params = array ($nom, $prenom, $u, $adrs, $com, $vil, $pa, $cp, $tel);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}


public function modify_adresse_livraison2Action()
{
    die();
}

public function majAddrsLivraisonAction($id)
{
     if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
 
           
        $iduser = $this->getUser()->getId();

   // if(count($thadressValide( $iduser,$id))) throw $this->createNotFoundException('L\'adresse n\'existe pas.');
               
       $this->fun1($iduser, $id);
                 
         return $this->redirect($this->generateUrl('livraison'));
}
}



public function delAddrsLivraisonAction($id)
{
     if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
 
           
        $iduser = $this->getUser()->getId();

   // if(count($thadressValide( $iduser,$id))) throw $this->createNotFoundException('L\'adresse n\'existe pas.');
               
       $this->fun3($iduser, $id);
                 
         return $this->redirect($this->generateUrl('livraison'));
}
}


public function fun1($iduser, $id)
{$conn2 = $this->get('database_connection');

                    if( $conn2 === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }

                           $this->fun2($iduser);
                  
                    $sql2 = "UPDATE utilisateur_adresse
SET livraison = '1' 
WHERE id = ?
and id_User = ?";
                    $param2 = array ( $id, $iduser);

                    $stmt2 = $conn2->executeUpdate( $sql2, $param2);

                     if( $stmt2 === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }

                    return ($stmt2);
                    
}

public function fun2($iduser)
{
            $conn = $this->get('database_connection');
                    
                    if( $conn === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }


    $sqll = "UPDATE utilisateur_adresse  
SET  livraison = '0'
WHERE id_User = ?";

                    //$xx = array(); 
                    $paramss = array ($iduser);
                    $stmtt = $conn->executeUpdate( $sqll, $paramss);
                    if( $stmtt === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    
return $stmtt;

}
public function fun3($iduser, $id)
{
  $conn = $this->get('database_connection');
                    
                    if( $conn === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }


    $sqll = "DELETE FROM `utilisateur_adresse` WHERE id = ? and id_User = ? ";

                    //$xx = array(); 
                    $paramss = array ($id, $iduser);
                    $stmtt = $conn->executeUpdate( $sqll, $paramss);
                    if( $stmtt === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    
return $stmtt;

}

public function modify_adresse_livraisonAction( $id1, $id2)
{
    $iduser = $this->getUser()->getId();
  die();
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "UPDATE `utilisateur_adresse` SET `facturation` = '0' WHERE id_User = ?";
$sqll = "UPDATE `utilisateur_adresse` SET `livraison` = '0' WHERE id_User = ?";

//$xx = array(); 
$params = array ($iduser);

$paramss = array ($iduser);

$stmt = $conn->executeUpdate( $sql, $params);

$stmtt = $conn->executeUpdate( $sqll, $paramss);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
if( $stmtt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql1 = "UPDATE `utilisateur_adresse` SET `facturation` = '1' WHERE id_User = ? and id = ?";
$sql2 = "UPDATE `utilisateur_adresse` SET `livraison` = '1' WHERE id_User = ? and id = ?" ;

//$xx = array(); 
$param1 = array ($iduser, $id1);

$param2 = array ($iduser, $id2);

$stmt1 = $conn->executeUpdate( $sql1, $param1);

$stmt2 = $conn->executeUpdate( $sql2, $param2);


return ($stmt1 && $stmt2);

}
public function livraison($iduser)
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM `utilisateur_adresse` WHERE livraison = 1 and id_User =' ; 
$z_1 = " ".$iduser;
$myquerystring_1=$myquerystring_1.$z_1;

$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;
}

public function adressValide($iduser, $id_adresse)
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM utilisateur_adresse u WHERE u.id = '; 
$z_1 = " ".$id_adresse;
$myquerystring_1=$myquerystring_1.$z_1;
$z_2 = " ".$iduser;
$myquerystring_1=$myquerystring_1." and u.id_User = ";
$myquerystring_1=$myquerystring_1.$z_2;
$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;
}


public function facturation( $iduser)
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * FROM `utilisateur_adresse` WHERE facturation = 1 and id_User ="; 
$z_1 = " ".$iduser;
$myquerystring_1=$myquerystring_1.$z_1;

$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;

}

public function newfacture($iduser, $prix, $date)
{
     
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "INSERT INTO `facture`( `idUser`, `PrixFacture`, `Reference`) VALUES (?,?,?) ";
//$xx = array(); 
$params = array ($iduser, $prix, $date);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;
}


public function allfacture($iduser)
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM `facture` WHERE idUser =' ; 
$z_1 = " ".$iduser;
$myquerystring_1=$myquerystring_1.$z_1;

$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;

}
public function allfactureadmin()
{
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = 'SELECT * FROM `facture` ';



$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;

}

public function payerAction($montant)
{
   if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
            

             $user = $this->getUser()->getId();
             $user_panier = $this->monPanier2($user); 
             $mail = $this->getUser()->getemailCanonical() ;

             $nameuser= $this->getUser()->getusername();
             $lelttre = "Bonjour ".$nameuser."\n.
             Nous vous remercions de votre interet pour notre site!!\n
             
             Et vous informons que votre commande à bien été prise en compte et validée.\n 
             Vous pouvez donc acceder  aux details de votre commande sur votre espace client et au passage obtenir une facture 
             qui vous servira pour un renvoi de coli ou un remboursement.\n

             L'équipe WilloTiMAProject vous remercie de votre commande\n

             Et à tres bientôt";


         
              $message = \Swift_Message::newInstance()
        ->setSubject('Validation de votre commande')
        ->setFrom('williamsviyou97@gmail.com')
        ->setTo('williamsviyou97@gmail.com')
        ->setBody($lelttre)
    ;

    $this->get('mailer')->send($message);

           if(count($user_panier !=0))
{
             $date =  $_SERVER['REQUEST_TIME'];
             $em = $this->getDoctrine()->getManager();
             $produits = $this->requete1($user);
             $user_panier = $this->monPanier2($user); 
             $actuel = $this->monPanier2($user);
             $livraison = $this->livraison($user);
             $facturation = $this->facturation($user);
             $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
             $this->newfacture($user, $montant, $date);

            $addrlivraison = $this->fun6($livraison);
            $addrfacturation = $this->fun6($facturation);
            $alpha =  $this->fun7($date, $user);
            $idfacture = $alpha[0]["idFacture"];

            $this->insertData_addr($addrlivraison, $addrfacturation, $idfacture, $montant);
            $alpha2 = $this->fun8($idfacture);
            $id_adrs = $alpha2[0]["id_briefing"];
//echo $dt->format('Y-m-d H:i:s');
            $this->fun9($user_panier, $user, $id_adrs );
       //     var_dump($user_panier);
            
             $factures=$this->allfacture($user);
           /*
$this->fun6( $this->livraison($user));
             $em = $this->getDoctrine()->getManager();
             $produits = $this->requete1($user);
             $user_panier = $this->monPanier2($user); 
             $livraison = $this->livraison($user);
             $facturation = $this->facturation($user);
             $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
             $this->newfacture($user, $montant);*/
             $x = array('id_user' => $user,
                        'produits' => $produits,
                        'panier' => $user_panier,
                        'livraison' => $livraison,
                        'facturation' => $facturation,
                        'tva' => $tva,
                        'factures' => $factures,
                        'encour' => $actuel
                        ) ;
            $addrlivraison = $this->fun6($livraison);
            $addrfacturation = $this->fun6($facturation);
             
             
  
             
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/facture.html.twig', $x );
   }  
    return $this->redirect($this->generateUrl('fos_user_security_login'));   
    }}
    public function supprimer_produit_inPanier_Action($id)
    {
       // DELETE FROM facture WHERE idFacture > 25 and idUser = 6 

    }

    public function fun9($tab, $iduser, $idata_adrrs)
    {
        for($i = 0 ; $i<count($tab); $i++ )
        {
             // $this->($iduser)  
           $this-> myinsert_IN_DATA($iduser, $tab[$i]['id_produit'], $tab[$i]['quantite'], $idata_adrrs);
            $this->delete_Produi_in_Panier($tab[$i]['id']);
        }
    }
 

 public function myinsert_IN_DATA($a, $b, $c, $d)
 {

 $conn = $this->get('database_connection');
                    
                    if( $conn === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }


    $sqll = "INSERT INTO `data` ( `idUser`, `idProduit`, `quantite`, `_data_adrre`) VALUES (?,?,?,?);";

                    //$xx = array(); 
                    $paramss = array ($a, $b, $c, $d);
                    $stmtt = $conn->executeUpdate( $sqll, $paramss);
                    if( $stmtt === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    
return $stmtt;


 }
    
public function fun8($idfacture)
{
    $conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = " SELECT * from data_adrs d where d.idFacture= " ; 
$z_1 = " ".$idfacture;
$myquerystring_1=$myquerystring_1.$z_1;

$user_database = $conn ->fetchAll($myquerystring_1);

return$user_database;

}


public function insertData_addr($adr1, $fac2, $idfa, $pri)
{
        
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = " INSERT INTO `data_adrs` ( `Adresse livraison`, `Adresse facturation`, `idFacture`, `Prix`) VALUES ( ?,?, ?, ?)";
//$xx = array(); 
$params = array ($adr1, $fac2, $idfa, $pri);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}




public function fun10 ($idfacture)
{
    $alpha2 = $this->fun8($idfacture);
    
    $id_adrs = $alpha2[0]["id_briefing"];
   
    //select * from data d, data_adrs dd WHERE d._data_adrre = dd.id_briefing and d.idUser = 6 
    $conn = $this->get('database_connection');
    
//$myquerystring_1 = "SELECT distinct * from data d, data_adrs dd, produits p WHERE (d._data_adrre = dd.id_briefing and d.idProduit = p.id) and d.idUser = " ; 
    
$myquerystring_1 = "SELECT * from data d , produits p where p.id=d.idProduit and d._data_adrre = "; 
$z_1 = " ".$id_adrs;
$myquerystring_1=$myquerystring_1.$z_1;
$user_database = $conn ->fetchAll($myquerystring_1);

return$user_database;
}
public function fun7($date, $user)
{
    $conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = " SELECT f. 	idFacture from facture f where f.Reference = " ; 
$z_1 = " ".$date;
$myquerystring_1=$myquerystring_1.$z_1;

$myquerystring_2 = ' and f.idUser = ';
$z_2 = $user." ";
$myquerystring_2=$myquerystring_2.$z_2;

$myquerystring_final = $myquerystring_1.$myquerystring_2;

$user_database = $conn ->fetchAll($myquerystring_final);

return$user_database;


}

public function detailAction($id)
{
  //  var_dump($this->fun10($id));
    die();
}


public function generatePDFAction($id)
{
   if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
             $user = $this->getUser()->getId();
            
             $em = $this->getDoctrine()->getManager();
             $produits = $this->fun10($id);
             $user_panier = $this->monPanier2($user); 
             $livraison = $this->livraison($user);
             $facturation = $this->facturation($user);;
             $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
           //  $this->newfacture($user, $montant);
             $factures=$this->allfacture($user);
             $x = array('id_user' => $user,
                        'produits' => $produits,
                        'panier' => $user_panier,
                        'livraison' => $livraison,
                        'facturation' => $facturation,
                        'tva' => $tva,
                        'factures' => $factures
                        ) ;
            
        //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/facturePDF.html.twig', $x );
    }}


public function fun6($x)
{
   // var_dump($x);
    $non = $x[0]['prenom']."  ".$x[0]['nom']." "." - ".$x[0]['Adresse']." ".$x[0]['Complement']." ".$x[0]['Ville']." ".$x[0]['Pays']." ".$x[0]['CodePostal']." Tel : ".$x[0]['Tel'];

return $non;
}



public function majAddrsfactuAction($id)
{
     if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
 
           
        $iduser = $this->getUser()->getId();

   // if(count($thadressValide( $iduser,$id))) throw $this->createNotFoundException('L\'adresse n\'existe pas.');
               
       $this->fun5($iduser, $id);
                 
         return $this->redirect($this->generateUrl('livraison'));
}
}









public function fun5($iduser, $id)
{$conn2 = $this->get('database_connection');

                    if( $conn2 === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }

                           $this->fun4($iduser);
                  
                    $sql2 = "UPDATE utilisateur_adresse
SET facturation = '1' 
WHERE id = ?
and id_User = ?";
                    $param2 = array ( $id, $iduser);

                    $stmt2 = $conn2->executeUpdate( $sql2, $param2);

                     if( $stmt2 === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }

                    return ($stmt2);
                    
}

public function fun4($iduser)
{
            $conn = $this->get('database_connection');
                    
                    if( $conn === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }


    $sqll = "UPDATE utilisateur_adresse  
SET  facturation= '0'
WHERE id_User = ?";

                    //$xx = array(); 
                    $paramss = array ($iduser);
                    $stmtt = $conn->executeUpdate( $sqll, $paramss);
                    if( $stmtt === false ) {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    
return $stmtt;

}




public function showFactureAction( )
{
   if($this->getUser() == null)
        {
         $this->get('session')->getFlashBag()->add('notification','Vous devez vous identifier. ');
      return $this->redirect($this->generateUrl('fos_user_security_login'));   
     //  return $this->new RedirectResponse($this->router->generate('fos_user_security_login')));  
        }
        else
        {
            
             $user = $this->getUser()->getId();
             $user_panier = $this->monPanier2($user); 
           if(count($user_panier !=0))
{
           //  $date =  $_SERVER['REQUEST_TIME'];
             $em = $this->getDoctrine()->getManager();
             $produits = $this->requete1($user);
             $user_panier = $this->monPanier2($user); 
             $actuel = $this->monPanier2($user);
             $livraison = $this->livraison($user);
             $facturation = $this->facturation($user);
             $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
             //$this->newfacture($user, $montant, $date);

            $addrlivraison = $this->fun6($livraison);
            $addrfacturation = $this->fun6($facturation);
           // $alpha =  $this->fun7($date, $user);
           // $idfacture = $alpha[0]["idFacture"];

           /* $this->insertData_addr($addrlivraison, $addrfacturation, $idfacture, $montant);
            $alpha2 = $this->fun8($idfacture);
            $id_adrs = $alpha2[0]["id_briefing"];
//echo $dt->format('Y-m-d H:i:s');*/
          //  $this->fun9($user_panier, $user, $id_adrs );
            
            
             $factures=$this->allfactureadmin();
           /*
$this->fun6( $this->livraison($user));
             $em = $this->getDoctrine()->getManager();
             $produits = $this->requete1($user);
             $user_panier = $this->monPanier2($user); 
             $livraison = $this->livraison($user);
             $facturation = $this->facturation($user);
             $tva=$em->getRepository('EcommerceEcommerceBundle:Tva')->findAll();
             $this->newfacture($user, $montant);*/
             $x = array('id_user' => $user,
                        'produits' => $produits,
                        'panier' => $user_panier,
                        'livraison' => $livraison,
                        'facturation' => $facturation,
                        'tva' => $tva,
                        'factures' => $factures,
                        'encour' => $actuel
                        ) ;
            $addrlivraison = $this->fun6($livraison);
            $addrfacturation = $this->fun6($facturation);
        return $this->render('EcommerceEcommerceBundle:Default:Panier/layout/facture.html.twig', $x );
   }  
    return $this->redirect($this->generateUrl('fos_user_security_login'));   
    }}


public function expedieAction($id ,$iduser)
{
  

{
      
  var_dump($this->expedier_requete($id));
             $user = $this->userById($iduser);
           
            $nameuser=$user[0]['username'] ;
            $mail  = $user[0]['email_canonical'];
             $lelttre = "Bonjour ".$nameuser."\n.
             Nous vous remercions de votre commande sur notre site!!\n
             
             Et vous informons que votre commande à bien été expédiée.\n 
             
             L'équipe WilloTiMAProject vous remercie de votre commande\n

             Et à tres bientôt";


         
              $message = \Swift_Message::newInstance()
        ->setSubject( $mail)
        ->setFrom('williamsviyou97@gmail.com')
        ->setTo('williamsviyou97@gmail.com')
        ->setBody($lelttre)
    ;
    $this->get('mailer')->send($message);


}


 return $this->redirect($this->generateUrl('showfacture'));

}








public function livraisonfinalAction($id ,$iduser)
{
  

      
 // var_dump($this->livraison_requete($id));
             $user = $this->userById($iduser);
           
            $nameuser=$user[0]['username'] ;
            $mail  = $user[0]['email_canonical'];
             $lelttre = "Bonjour ".$nameuser."\n.
             Nous vous remercions de votre commande sur notre site!!\n
             
             Et vous informons que votre commande à bien été livrée à l'adresse marqué sur la facture.\n 
             
             L'équipe WilloTiMAProject vous remercie de votre commande\n

             Et à tres bientôt";


         
              $message = \Swift_Message::newInstance()
        ->setSubject( $mail)
        ->setFrom('williamsviyou97@gmail.com')
        ->setTo('williamsviyou97@gmail.com')
        ->setBody($lelttre);
    ;
    $this->get('mailer')->send($message);








 return $this->redirect($this->generateUrl('showfacture'));

}







public function expedier_requete($idfacture)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "UPDATE `facture` SET `Livré` = 'Expedier' WHERE `facture`.`idFacture` = ?";
//$xx = array(); 
$params = array ($idfacture);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}








public function livraison_requete($idfacture)
{
  
$conn = $this->get('database_connection');
  
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$sql = "INSERT INTO `panier`(`id`, `contenu`) VALUES (?,?)";
//$sql = "UPDATE `panier` SET `contenu`= ? WHERE id = ?";
$sql = "UPDATE `facture` SET `Livré` = 'Expedier' WHERE `facture`.`idFacture` = ?";
//$xx = array(); 
$params = array ($idfacture);

$stmt = $conn->executeUpdate( $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
return $stmt;

}



public function userById($iduser){
    
$conn = $this->get('database_connection');

// $conn ->prepare('SELECT * FROM user u WHERE u.id = ? ')

// $user_database[0]['panier'] = $user_panier_final ;

$myquerystring_1 = "SELECT * FROM `user` WHERE id= "; 
$z_1 = " ".$iduser;
$myquerystring_1=$myquerystring_1.$z_1;

$adr_database = $conn ->fetchAll($myquerystring_1);

return $adr_database;

}

}