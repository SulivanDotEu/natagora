<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Walva\NatagoraBundle\Entity\Invite;

/**
 * Inscription
 *
 * @ORM\Table(name="natagora2_inscription")
 * @ORM\Entity(repositoryClass="Walva\NatagoraBundle\Entity\InscriptionRepository")
 */
class Inscription {

    public static $ETAT_INSCRIT = 310;
    public static $ETAT_EN_ATTENTE = 320;
    public static $ETAT_ANNULE_USER = 330;
    public static $ETAT_ANNULE_ADMIN = 340;
    public static $ETAT_REINSCRIT = 350;

    public function __construct() {
        $this->date = new \DateTime('NOW');
    }

    public function estInscription() {
        return true;
    }
    
    public function annulerInvitation(){
        $this->getInvite()->setInscription(null);
        $this->setInvite(null);
        $this->getEvenement()->updatePosition();
    }

    /**
     * recois la derniere actuelle de la chaine
     * si l'inscription est voué à recevoir la position,
     * elle incrémente la position donnée et se la donne et la renvois.
     * sinon elle renvoie la position recue et applique 0 a la sienne
     * @param int $previousPosition
     */
    public function updatePosition($previousPosition) {



        // si l'inscription n'est pas active (donc annulé) il faut pas mettre
        // de position
        if (!$this->estActive()) {
            $this->setPosition(0);
            if ($this->possedeInvite()) {
                $this->getInvite()->setPosition(0);
                $this->getInvite()->setEtat($this->getEtat());
            }
            return $previousPosition;
        }
        // mise a jour de la position
        $this->setPosition(++$previousPosition);
        // si la position est + grande que le max de l'evenement,
        // l'inscirption passe en attente.
        if ($previousPosition > $this->getEvenement()->getMax()) {
            $this->setEtat(self::$ETAT_EN_ATTENTE);
        } else {
            $this->setEtat(self::$ETAT_INSCRIT);
        }

        // gesiton de l'invite
        $invite = $this->getInvite();
        if ($invite != null) {
            $gestionInvite = $this->getEvenement()->getTypeGestionInvite();
            switch ($gestionInvite) {
                case Evenement::$GESTION_INVITE_FOLLOW:
                    // l'invite suit l'utilisateur : 
                    $invite->setPosition(++$previousPosition);
                    if ($previousPosition > $this->getEvenement()->getMax()) {
                        $invite->setEtat(self::$ETAT_EN_ATTENTE);
                    } else {
                        $invite->setEtat(self::$ETAT_INSCRIT);
                    }
                    break;
                case Evenement::$GESTION_INVITE_PUSH_BOTTOM:
                    $this->getEvenement()->enregistrerInviteAPlacer($invite);
                    break;
                case Evenement::$GESTION_INVITE_TIME_ORDER:
                    $this->getEvenement()->enregistrerInviteAPlacer($invite);
                    break;

                default:
                    break;
            }
        }

        return $previousPosition;
    }

    public function desinscrire() {
        $this->setEtat(self::$ETAT_ANNULE_USER);
    }

    public function annuler() {
        $this->setEtat(self::$ETAT_ANNULE_ADMIN);
    }

    public function estActive() {
        if ($this->etat == self::$ETAT_ANNULE_ADMIN)
            return false;
        if ($this->etat == self::$ETAT_ANNULE_USER)
            return false;
        return true;
    }

    public function estPartant() {
        if ($this->etat == self::$ETAT_INSCRIT)
            return true;
        if ($this->etat == self::$ETAT_REINSCRIT)
            return true;
        return false;
    }

    public function estEnAttente() {
        if ($this->etat == self::$ETAT_EN_ATTENTE)
            return true;
        return false;
    }

    public function possedeInvite() {
        if (isset($this->invite )) {
            return true;
        }
        return false;
    }

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Walva\NatagoraBundle\Entity\Eleve", inversedBy="inscriptions", cascade={"persist"})
     */
    private $eleve;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Walva\NatagoraBundle\Entity\Evenement", inversedBy="inscriptions", cascade={"persist"})
     */
    private $evenement;

    /**
     * @ORM\OneToOne(targetEntity="Walva\NatagoraBundle\Entity\Invite", inversedBy="inscription", cascade={"persist"}, fetch="EAGER")
     */
    private $invite;

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
     * @var integer
     *
     * @ORM\Column(name="etat", type="smallint", nullable=true)
     */
    private $etat;

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
    public function setEleve(\Walva\NatagoraBundle\Entity\Eleve $eleve) {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \Walva\NatagoraBundle\Entity\Eleve 
     */
    public function getEleve() {
        return $this->eleve;
    }

    /**
     * Set evenement
     *
     * @param \Walva\NatagoraBundle\Entity\Evenement $evenement
     * @return Inscription
     */
    public function setEvenement(\Walva\NatagoraBundle\Entity\Evenement $evenement) {
        $this->evenement = $evenement;
        $this->evenement->addInscription($this);

        return $this;
    }

    /**
     * Get evenement
     *
     * @return \Walva\NatagoraBundle\Entity\Evenement 
     */
    public function getEvenement() {
        return $this->evenement;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Inscription
     */
    public function setEtat($etat) {

        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set invite
     *
     * @param string $invite
     * @return Inscription
     */
    public function setInvite($invite) {
        $this->invite = $invite;

        return $this;
    }

    /**
     * Get invite
     *
     * @return Invite 
     */
    public function getInvite() {
        return $this->invite;
    }

}