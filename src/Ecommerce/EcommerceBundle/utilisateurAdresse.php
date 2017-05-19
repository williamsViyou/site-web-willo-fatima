<?php

namespace Ecommerce\EcommerceBundle\Entity;

/**
 * utilisateuradresse
 */
class utilisateuradresse
{

    /**

     * @ORM\ManyToOne(targetEntity="MyUser\UtilisateursBundle\Entity\User", inversedBy="commandes")

     * @ORM\JoinColumn(nullable=true)

     */
     private $utilisateur;



    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $adresse;


    /**
     * @var string
     */
    private $cp;

    /**
     * @var string
     */
    private $pays;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $complement;





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
     * @return utilisateurAdresse
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return utilisateurAdresse
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }




    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return utilisateurAdresse
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }


        /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return utilisateurAdresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }




        /**
     * Set cp
     *
     * @param string $cp
     *
     * @return utilisateurAdresse
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }




        /**
     * Set pays
     *
     * @param string $pays
     *
     * @return utilisateurAdresse
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }




        /**
     * Set ville
     *
     * @param string $ville
     *
     * @return utilisateurAdresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }




        /**
     * Set complement
     *
     * @param string $complement
     *
     * @return utilisateurAdresse
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }





}

