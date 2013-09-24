<?php

namespace Walva\UserBundle\Entity;

use Walva\NatagoraBundle\Entity\Eleve;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="natagora_user")
 */
class User extends BaseUser
{
    
    public function isAdmin(){
        if($this->hasRole('ROLE_ADMIN')) return true;
        if($this->hasRole('ROLE_SUPER_ADMIN')) return true;
        return false;
    }
    
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;
  
  /**
     * @ORM\OneToOne(targetEntity="Walva\NatagoraBundle\Entity\Eleve", cascade={"persist"}, inversedBy="user")
     * @ORM\JoinColumn(name="eleve_id", referencedColumnName="id")
     */
  protected $eleve;
    
    /**
     * Set eleve
     *
     * @param \stdClass $formateur
     * @return Evenement
     */
    public function setEleve($eleve) {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \stdClass 
     */
    public function getEleve() {
        return $this->eleve;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        $this->setUsername($email);
        return $this;
    }


}
