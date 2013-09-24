<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\NatagoraBundle\Entity\Eleve;
use Walva\NatagoraBundle\Form\EleveType;

/**
 * Eleve controller.
 *
 */
class StaticController extends Controller {

    /**
     * Lists all Eleve entities.
     *
     */
    public function indexAction() {
       
        return $this->redirect($this->generateUrl('fos_user_security_login'));
  
    }


}
