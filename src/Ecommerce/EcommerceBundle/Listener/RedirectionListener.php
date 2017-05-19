<?php
namespace Ecommerce\EcommerceBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener 
{
    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.context');
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

    
    public function onKernelRequest(GetResponseEvent $event)
    {
        
        $user = $this->getUser()->getId();
        $user_panier = $this->monPanier2($user); 
        
        $route = $event->getRequest()->attributes->get('_route');
        
        if ($route == 'livraison' || $route == 'validation') {
            if (isset($user_panier)) {
                if (count($user_panier) == 0)
                    $event->setResponse(new RedirectResponse($this->router->generate('panier')));
            }
        
            if (!is_object($this->securityContext->getToken()->getUser())) {
                $this->session->getFlashBag()->add('success','notification','Vous devez vous identifier. ');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }
}