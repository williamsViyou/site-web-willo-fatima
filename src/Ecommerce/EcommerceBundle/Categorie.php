<?php

namespace Ecommerce\EcommerceBundle\Entity;

/**
 * categorie
 */
class categorie
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
    *@ORM\OnetoOne (targetEntity="Ecommerce\EcommerceBundle\Entity\Media", cascade={"persit", "remove"})
    *@ORM\JoinColumn(nullable = false)
    */
    private $image;



    /**
     * @var int
     */
    private $imageId;

   

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
     * Set imageId
     *
     * @param integer $imageId
     *
     * @return Categorie
     */
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return int
     */
    public function getImageId()
    {
        return $this->imageId;
    }
}

