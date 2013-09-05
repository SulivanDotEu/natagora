<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="natagora2_lieu")
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\LieuRepository")
 */
class Lieu
{
    
    public function __toString() {
        return $this->getNom();
    }

    
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="urlGoogleMap", type="text", nullable=true)
     */
    private $urlGoogleMap;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rendezvous", type="text", nullable=true)
     */
    private $rendezvous;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


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
     * Set urlGoogleMap
     *
     * @param string $urlGoogleMap
     * @return Lieu
     */
    public function setUrlGoogleMap($urlGoogleMap)
    {
        $this->urlGoogleMap = $urlGoogleMap;
    
        return $this;
    }

    /**
     * Get urlGoogleMap
     *
     * @return string 
     */
    public function getUrlGoogleMap()
    {
        return $this->urlGoogleMap;
    }


    /**
     * Set rendezvous
     *
     * @param string $rendezvous
     * @return Lieu
     */
    public function setRendezvous($rendezvous)
    {
        $this->rendezvous = $rendezvous;
    
        return $this;
    }

    /**
     * Get rendezvous
     *
     * @return string 
     */
    public function getRendezvous()
    {
        return $this->rendezvous;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Lieu
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
     * @return Lieu
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
}