<?php
// src/AppBundle/Entity/User.php

namespace Ecommerce\EcommerceBundle\Using\Linker ;

class Mesure
{
    private $quantite;
    private $idPrduit ;
    
    public function __construct($id, $q)
    {
        $this->setIdProduit($id);
        $this->setQuantite($q);
    }

    public function setQuantite($x)
    {
        $this->quantite=$x ;
        return $this ; 
    }

    
    public function setIdProduit($x)
    {
        $this->idPrduit =$x ;
          return $this;
    }

    
    public function getQuantite()
    {
       return  $this->quantite ;
    }

    
    public function getIdProduit()
    {
        return  $this->idPrduit ;
    }
}
