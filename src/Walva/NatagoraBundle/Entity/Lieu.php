<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\LieuRepository")
 */
class Lieu
{
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
     * @ORM\Column(name="rue", type="string", length=255, nullable=true)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=255)
     */
    private $codePostal;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255, nullable=true)
     */
    private $numero;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="decimal", nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="decimal", nullable=true)
     */
    private $longitude;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Lieu
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    
        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Lieu
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    
        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Lieu
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Lieu
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Lieu
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
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
     * Set ville
     *
     * @param string $ville
     * @return Lieu
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
}