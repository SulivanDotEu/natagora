<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\UserBundle\Entity\User;
use Walva\NatagoraBundle\Entity\Formation;

/**
 * Eleve
 *
 * @ORM\Table(name="natagora2_eleve")
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\EleveRepository")
 */
class Eleve {

    public function identifiantClarolineVide() {
        $clLogin = $this->getClLogin();
        if(empty($clLogin)){
            return true;
        }
        return false;
    }

    public function getNombreInscriptions($type, $total = false, \DateTime $when = null) {
        $count = 0;

        if ($when == null) {
            $when = (new \DateTime("NOW"))->getTimestamp();
        } else {
            $when = $when->getTimestamp();
        }

        foreach ($this->inscriptions as $inscription) {
            /* @var $inscription Inscription */
            if ($inscription->getEvenement()->getType() != $type)
                continue;
            if (!$total) {
                $eventTimeStamp = $inscription->getEvenement()
                                ->getDate()->getTimestamp();
                if ($when > $eventTimeStamp)
                    continue;
            }
            $count++;
        }
        return $count;
    }

    public function getNombreVoyageInscrits() {
        $count = 0;
        foreach ($this->inscriptions as $inscription) {
            /* @var $inscription Inscription */
            if ($inscription != Evenement::$TYPE_VOYAGE)
                continue;
            $now = (new \DateTime("NOW"))->getTimestamp();
            $eventTimeStamp = $inscription->getEvenement()
                            ->getDate()->getTimestamp();
            if ($now > $eventTimeStamp)
                continue;
            $count++;
        }
        return $count;
    }

    public function __toString() {
        return '' . $this->getPrenom() . ' ' . $this->getNom();
    }

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="Walva\NatagoraBundle\Entity\Formation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $formations;

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
     * @ORM\Column(name="clogin", type="string", length=255, nullable=true)
     */
    private $clLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="cpass", type="string", length=255, nullable=true)
     */
    private $clPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm1", type="string", length=255, nullable=true)
     */
    private $gsm1;

    /**
     * @var string
     *
     * @ORM\Column(name="gsm2", type="string", length=255, nullable=true)
     */
    private $gsm2;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @var User
     * 
     * @ORM\OneToOne(targetEntity="Walva\UserBundle\Entity\User", mappedBy="eleve", cascade={"remove", "persist"}))
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Walva\NatagoraBundle\Entity\Inscription", mappedBy="eleve", cascade={"remove"}))
     */
    private $inscriptions;

    public function isLinkedToAnUser() {
        if (isset($this->user))
            return true;
        return false;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Eleve
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Eleve
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail() {
        if (!isset($this->user))
            return null;
        return $this->user->getEmail();
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Eleve
     */
    public function setTel($tel) {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel() {
        return $this->tel;
    }

    /**
     * Set gsm1
     *
     * @param string $gsm1
     * @return Eleve
     */
    public function setGsm1($gsm1) {
        $this->gsm1 = $gsm1;

        return $this;
    }

    /**
     * Get gsm1
     *
     * @return string 
     */
    public function getGsm1() {
        return $this->gsm1;
    }

    /**
     * Set gsm2
     *
     * @param string $gsm2
     * @return Eleve
     */
    public function setGsm2($gsm2) {
        $this->gsm2 = $gsm2;

        return $this;
    }

    /**
     * Get gsm2
     *
     * @return string 
     */
    public function getGsm2() {
        return $this->gsm2;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Eleve
     */
    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal() {
        return $this->codePostal;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Eleve
     */
    public function setPays($pays) {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays() {
        return $this->pays;
    }

    /**
     * Set clLogin
     *
     * @param string $clLogin
     * @return Eleve
     */
    public function setClLogin($clLogin) {
        $this->clLogin = $clLogin;

        return $this;
    }

    /**
     * Get clLogin
     *
     * @return string 
     */
    public function getClLogin() {
        return $this->clLogin;
    }

    /**
     * Set clPassword
     *
     * @param string $clPassword
     * @return Eleve
     */
    public function setClPassword($clPassword) {
        $this->clPassword = $clPassword;

        return $this;
    }

    /**
     * Get clPassword
     *
     * @return string 
     */
    public function getClPassword() {
        return $this->clPassword;
    }

    /**
     * Set user
     *
     * @param \Walva\UserBundle\Entity\User $user
     * @return Eleve
     */
    public function setUser(\Walva\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Walva\UserBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function containsFormation(\Walva\NatagoraBundle\Entity\Formation $f) {
        foreach ($this->formations as $formation) {
            if ($f->getId() == $formation->getId()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Add formations
     *
     * @param \Walva\NatagoraBundle\Entity\Formation $formations
     * @return Eleve
     */
    public function addFormation(\Walva\NatagoraBundle\Entity\Formation $formations) {
        $this->formations[] = $formations;

        return $this;
    }

    /**
     * Remove formations
     *
     * @param \Walva\NatagoraBundle\Entity\Formation $formations
     */
    public function removeFormation(\Walva\NatagoraBundle\Entity\Formation $formations) {
        $this->formations->removeElement($formations);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormations() {
        return $this->formations;
    }

    /**
     * Add inscriptions
     *
     * @param \Walva\NatagoraBundle\Entity\Inscription $inscriptions
     * @return Eleve
     */
    public function addInscription(\Walva\NatagoraBundle\Entity\Inscription $inscriptions) {
        $this->inscriptions[] = $inscriptions;

        return $this;
    }

    /**
     * Remove inscriptions
     *
     * @param \Walva\NatagoraBundle\Entity\Inscription $inscriptions
     */
    public function removeInscription(\Walva\NatagoraBundle\Entity\Inscription $inscriptions) {
        $this->inscriptions->removeElement($inscriptions);
    }

    /**
     * Get inscriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInscriptions() {
        return $this->inscriptions;
    }

}