<?php

namespace Ecommerce\EcommerceBundle\Entity;

/**
 * Panier
 */
class Panier
{
    /**
     * @var int
     */
    private $id;


   
    /**
     * @var int
     */
    private $id_user;



   
    /**
     * @var int
     */
    private $quantité;
    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @var array
     */
    private $contenu;


    /**
     * Set contenu
     *
     * @param array $contenu
     *
     * @return Panier
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return array
     */
    public function getContenu()
    {
        return $this->contenu;
    }
}
