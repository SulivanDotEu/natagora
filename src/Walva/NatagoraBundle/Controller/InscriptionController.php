<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\NatagoraBundle\Entity\Evenement;
use Walva\NatagoraBundle\Form\EvenementType;
use Walva\NatagoraBundle\Entity\Eleve;
use Walva\NatagoraBundle\Entity\Inscription;
use \Walva\NatagoraBundle\Entity\Invite;
use \Walva\NatagoraBundle\Form\InviteType;
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
    public function inscrireAction(Eleve $eleve, Evenement $evenement) {
        $inscription = $evenement->inscrireEleve($eleve);

        $em = $this->getDoctrine()->getManager();
        $em->persist($inscription);
        $em->persist($evenement);
        $em->flush();

        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @ParamConverter("eleve", class="WalvaNatagoraBundle:Eleve")
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function desinscrireAction(Eleve $eleve, Evenement $evenement) {
        $evenement->desinscrireEleve($eleve);

        $em = $this->getDoctrine()->getManager();
        $em->persist($evenement);
        $em->flush();

        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function refreshAction(Evenement $evenement) {
        $evenement->updatePosition();

        $em = $this->getDoctrine()->getManager();
        $em->persist($evenement);
        $em->flush();

        return $this->redirect($this->generateUrl('index'));
    }

    /**
     * @ParamConverter("eleve", class="WalvaNatagoraBundle:Eleve")
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function newInviteAction(Eleve $eleve, Evenement $evenement) {
        $invite = new Invite();
        $inscription = $evenement->getInscriptionParEleve($eleve);
        $inscription->setInvite($invite);
        $form = $this->createForm(new InviteType(), $invite);
        return $this->render('WalvaNatagoraBundle:Invite:new.html.twig', array(
                    'entity' => $invite,
                    'eleve' => $eleve,
                    'evenement' => $evenement,
                    'form' => $form->createView(),
                ));
    }

    /**
     * @ParamConverter("invite", class="WalvaNatagoraBundle:Invite")
     */
    public function cancelInviteAction(Invite $invite) {
        $em = $this->getDoctrine()->getManager();
        $inscription = $invite->getInscription();
        $evenement = $inscription->getEvenement();
        
        $invite->getInscription()->annulerInvitation();
        
        $invite->setInscription(null);
        $inscription->setInvite(null);
        
        var_dump($invite);
        var_dump($inscription);
        
        $em->persist($evenement);
        $em->persist($inscription);
        $em->remove($invite);
        $em->flush();
        

        
        //$em->remove($invite);
        
        //$em->flush();

        return $this->redirect($this->generateUrl('evenement_show', array('id' => $evenement->getId())));
    }

    /**
     * @ParamConverter("eleve", class="WalvaNatagoraBundle:Eleve")
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function createInviteAction(Request $request, Eleve $eleve, Evenement $evenement) {
        $invite = new Invite();
        $inscription = $evenement->getInscriptionParEleve($eleve);
        $inscription->setInvite($invite);
        $form = $this->createForm(new InviteType(), $invite);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invite);
            $em->persist($inscription);
            $em->persist($evenement);
            $em->flush();

            return $this->redirect($this->generateUrl('evenement_show', array('id' => $evenement->getId())));
        }
        die();

        return $this->render('WalvaNatagoraBundle:Invite:new.html.twig', array(
                    'entity' => $invite,
                    'eleve' => $eleve,
                    'evenement' => $evenement,
                    'form' => $form->createView(),
                ));
    }

}
