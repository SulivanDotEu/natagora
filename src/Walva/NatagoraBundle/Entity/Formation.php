<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="natagora2_formation")
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\FormationRepository")
 */
class Formation
{
    
    public static $COULEUR_GRIS = 1;
    public static $COULEUR_VERT = 2;
    public static $COULEUR_ORANGE = 3;
    public static $COULEUR_ROUGE = 4;
    public static $COULEUR_BLEU = 5;
    public static $COULEUR_NOIR = 6;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=255)
     */
    private $nomComplet;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="couleur", type="smallint", nullable=true)
     */
    private $couleur;
    
    


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Formation
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
     * Set nomComplet
     *
     * @param string $nomComplet
     * @return Formation
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;
    
        return $this;
    }

    /**
     * Get nomComplet
     *
     * @return string 
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set couleur
     *
     * @param integer $couleur
     * @return Formation
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    
        return $this;
    }

    /**
     * Get couleur
     *
     * @return integer 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
}