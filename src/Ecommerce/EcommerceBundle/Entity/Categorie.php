<?php

namespace Ecommerce\EcommerceBundle\Entity;

/**
 * Categorie
 */
class Categorie
{
    /**
     * @var int
     */
    private $id;


    /**
     * @var string
     */
    private $nom;



    /**
    *@ORM\OneToOne (targetEntity="Ecommerce\EcommerceBundle\Entity\Media", cascade={"persist", "remove"})
    *@ORM\JoinColumn(nullable = false)
    */
    private $image;



  

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

  
    /**
     * @var integer
     */
    private $imageId;


    /**
     * Set imageId
     *
     * @param integer $imageId
     *
     * @return Categorie
     */
    public function setImageId( $imageId)
    {
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return integer
     */
    public function getImageId()
    {
        return $this->imageId;
    }
}
