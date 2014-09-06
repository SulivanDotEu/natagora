<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\NatagoraBundle\Entity\Inscription;

/**
 * Invite
 *
 * @ORM\Table(name="natagora2_invite")
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\InviteRepository")
 */
class Invite
{
    
    public function __toString() {
        return $this->getPrenom().' '.$this->getNom();
    }
    
    public function estActive() {
        if ($this->etat == Inscription::$ETAT_ANNULE_ADMIN)
            return false;
        if ($this->etat == Inscription::$ETAT_ANNULE_USER)
            return false;
        return true;
    }

    public function estPartant() {
        if ($this->etat == Inscription::$ETAT_INSCRIT)
            return true;
        if ($this->etat == Inscription::$ETAT_REINSCRIT)
            return true;
        return false;
    }

    public function estEnAttente() {
        if ($this->etat == Inscription::$ETAT_EN_ATTENTE)
            return true;
        return false;
    }

    
    public function estInscription(){
        return false;
    }
    
    function __construct() {
        $this->date = new \DateTime('NOW');
        
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="smallint", nullable=true)
     */
    private $etat;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint", nullable=true)
     */
    private $position;
    
    /**
     * @ORM\OneToOne(targetEntity="Walva\NatagoraBundle\Entity\Inscription", mappedBy="invite")
     */
    private $inscription;


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
     * @return Invite
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
     * @return Invite
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
     * Set email
     *
     * @param string $email
     * @return Invite
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Invite
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
     * Set date
     *
     * @param \DateTime $date
     * @return Invite
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Invite
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Invite
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set inscription
     *
     * @param \Walva\NatagoraBundle\Entity\Inscription $inscription
     * @return Invite
     */
    public function setInscription(\Walva\NatagoraBundle\Entity\Inscription $inscription = null)
    {
        $this->inscription = $inscription;
    
        return $this;
    }

    /**
     * Get inscription
     *
     * @return \Walva\NatagoraBundle\Entity\Inscription 
     */
    public function getInscription()
    {
        return $this->inscription;
    }
}
