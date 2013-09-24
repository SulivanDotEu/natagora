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
use Walva\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserInterface;
use Walva\NatagoraBundle\Exception\BusinessException;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Evenement controller.
 *
 */
class InscriptionController extends Controller {

    public function inviterAction(Evenement $evenement) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }
        $eleve = $user->getEleve();

        return $this->newInviteAction($eleve, $evenement);
    }

    public function sinscrireAction(Evenement $evenement) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }
        try {
            $inscription = $evenement->eleveSinscrit($user->getEleve());
        } catch (BusinessException $exc) {
            $session = new Session();
            $session->getFlashBag()->add('error', $exc->getMessage());
            return $this->redirect($this->generateUrl('public_evenement_show', array(
                            'id' => $evenement->getId()
                        )));
        }

        

        $em = $this->getDoctrine()->getManager();
        $em->persist($inscription);
        $em->persist($inscription->getEvenement());
        $em->flush();

        return $this->redirect($this->generateUrl('public_evenement_show', array(
                            'id' => $evenement->getId()
                        )));
    }

    public function sedesinscrireAction(Evenement $evenement) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }
        $eleve = $user->getEleve();
        $evenement->eleveSeDesinscrit($eleve);

        $em = $this->getDoctrine()->getManager();
        $em->persist($evenement);
        $em->persist($evenement->getInscriptionParEleve($eleve));
        $em->flush();


        return $this->redirect($this->generateUrl('public_evenement_show', array(
                            'id' => $evenement->getId()
                        )));
    }

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

        return $this->redirect($this->generateUrl('evenement_show', array(
                            'id' => $evenement->getId()
                        )));
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

        return $this->redirect($this->generateUrl('evenement_show', array(
                            'id' => $evenement->getId()
                        )));
    }

    /**
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function refreshAction(Evenement $evenement) {
        $evenement->updatePosition();

        $em = $this->getDoctrine()->getManager();
        $em->persist($evenement);
        $em->flush();

        return $this->redirect($this->generateUrl('evenement_show', array(
                            'id' => $evenement->getId()
                        )));
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

        $em->persist($evenement);
        $em->persist($inscription);
        $em->remove($invite);
        $em->flush();


        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }
        $eleve = $user->getEleve();
        if (isset($eleve))
            return $this->redirect($this->generateUrl('public_evenement_show', array('id' => $evenement->getId())));
        return $this->redirect($this->generateUrl('evenement_show', array('id' => $evenement->getId())));
    }

    /**
     * @ParamConverter("eleve", class="WalvaNatagoraBundle:Eleve")
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function newInviteAction(Eleve $eleve, Evenement $evenement) {
        $invite = new Invite();
        $inscription = $evenement->getInscriptionParEleve($eleve);
        if ($inscription->possedeInvite()) {
            throw new \Exception('L\'élève ' . $eleve . ' a déjà inviter ' .
                    $inscription->getInvite() . ' pour cet évènement.');
        }
        $form = $this->createForm(new InviteType(), $invite);
        return $this->render('WalvaNatagoraBundle:Invite:new.html.twig', array(
                    'entity' => $invite,
                    'eleve' => $eleve,
                    'evenement' => $evenement,
                    'form' => $form->createView(),
                ));
    }

    /**
     * @ParamConverter("eleve", class="WalvaNatagoraBundle:Eleve")
     * @ParamConverter("evenement", class="WalvaNatagoraBundle:Evenement")
     */
    public function createInviteAction(Request $request, Eleve $eleve, Evenement $evenement) {

        $invite = new Invite();
        /*
         * $inscription = $evenement->getInscriptionParEleve($eleve);
          $inscription->setInvite($invite);
         */

        $form = $this->createForm(new InviteType(), $invite);
        $form->bind($request);

        if ($form->isValid()) {
            $inscription = $evenement->inviter($eleve, $invite);


            $em = $this->getDoctrine()->getManager();
            $em->persist($invite);
            $em->persist($inscription);
            $em->persist($evenement);
            $em->flush();

            $user = $this->container->get('security.context')->getToken()->getUser();
            if (!is_object($user) || !$user instanceof UserInterface) {
                throw new AccessDeniedException(
                        'Problem...');
            }
            $eleve = $user->getEleve();
            if (isset($eleve))
                return $this->redirect($this->generateUrl('public_evenement_show', array('id' => $evenement->getId())));
            return $this->redirect($this->generateUrl('evenement_show', array('id' => $evenement->getId())));
        }

        return $this->render('WalvaNatagoraBundle:Invite:new.html.twig', array(
                    'entity' => $invite,
                    'eleve' => $eleve,
                    'evenement' => $evenement,
                    'form' => $form->createView(),
                ));
    }

}
