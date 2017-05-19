<?php

namespace Ecommerce\EcommerceBundle\Entity;

/**
 * Produits
 */
class Produits
{
    /**
     * @var int
     */
    private $id;


    /**
    *@ORM\OneToOne (targetEntity="Ecommerce\EcommerceBundle\Entity\Media", cascade={"persist", "remove"})
    *@ORM\JoinColumn(nullable = false)
    */
    private $imagelink;

    /**
    *@ORM\ManyToOne (targetEntity="Ecommerce\EcommerceBundle\Entity\Categorie", cascade={"persist", "remove"})
    *@ORM\JoinColumn(nullable = false)
    */
    private $categorie;

    /**
    *@ORM\ManyToOne (targetEntity="Ecommerce\EcommerceBundle\Entity\Tva", cascade={"persist", "remove"})
    *@ORM\JoinColumn(nullable = false)
    */
    private $tva;
    


    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $prix;

    /**
     * @var bool
     */
    private $disponible;


    /**
     * @var string
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
     * @return Produits
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
     * Set description
     *
     * @param string $description
     *
     * @return Produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Produits
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return bool
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

   
   


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Produits
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }



    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Produits
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return Produits
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return float
     */
    public function getTva()
    {
        return $this->tva;
    }
}
