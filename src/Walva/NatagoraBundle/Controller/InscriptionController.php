<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\NatagoraBundle\Entity\Evenement;
use Walva\NatagoraBundle\Form\EvenementType;
use Walva\NatagoraBundle\Entity\Eleve;
use Walva\NatagoraBundle\Entity\Inscription;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Evenement controller.
 *
 */
class InscriptionController extends Controller {

    /**
     * @ParamConverter("eleve", class="WalvaNatagoraBundle:Eleve")
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function inscrireAction(Eleve $eleve, Evenement $evenement){
        $inscription = new Inscription();
        $inscription->setEleve($eleve);
        $inscription->setEvenement($evenement);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($inscription);
        $em->flush();
        
        return $this->redirect($this->generateUrl('index'));
        
        
    }

}
