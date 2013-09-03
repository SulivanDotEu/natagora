<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\InscriptionRepository")
 */
class Inscription {
    
    function __construct() {
        $this->date = new \DateTime('NOW');
    }

        /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Walva\NatagoraBundle\Entity\Eleve")
     */
    private $eleve;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Walva\NatagoraBundle\Entity\Evenement", inversedBy="inscriptions")
     */
    private $evenement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint", nullable=true)
     */
    private $position;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInactive", type="datetime", nullable=true)
     */
    private $dateInactive;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Inscription
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Inscription
     */
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Inscription
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set dateInactive
     *
     * @param \DateTime $dateInactive
     * @return Inscription
     */
    public function setDateInactive($dateInactive) {
        $this->dateInactive = $dateInactive;

        return $this;
    }

    /**
     * Get dateInactive
     *
     * @return \DateTime 
     */
    public function getDateInactive() {
        return $this->dateInactive;
    }


    /**
     * Set eleve
     *
     * @param \Walva\NatagoraBundle\Entity\Eleve $eleve
     * @return Inscription
     */
    public function setEleve(\Walva\NatagoraBundle\Entity\Eleve $eleve)
    {
        $this->eleve = $eleve;
    
        return $this;
    }

    /**
     * Get eleve
     *
     * @return \Walva\NatagoraBundle\Entity\Eleve 
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Set evenement
     *
     * @param \Walva\NatagoraBundle\Entity\Evenement $evenement
     * @return Inscription
     */
    public function setEvenement(\Walva\NatagoraBundle\Entity\Evenement $evenement)
    {
        $this->evenement = $evenement;
    
        return $this;
    }

    /**
     * Get evenement
     *
     * @return \Walva\NatagoraBundle\Entity\Evenement 
     */
    public function getEvenement()
    {
        return $this->evenement;
    }
}