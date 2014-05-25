<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Response;
use Walva\NatagoraBundle\Entity\Evenement;

class UserController extends Controller {

    public function getQuotaAction(){
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }
        $eleve = $user->getEleve();
        /* @var $eleve Eleve */
        //var_dump($eleve->getQuotaSortie());
        //die();
        return $this->render('WalvaNatagoraBundle:Eleve:public/quota.html.twig', array(
                    'quotaSortie' => $eleve->getQuotaSortie(),
                    'quotaWeekend' => $eleve->getQuotaWeekend(),
                    'quotaSortieMax' => Evenement::$QUOTA_SORTIE,
                    'quotaWeekendMax' => Evenement::$QUOTA_WEEKEND,
                ));
    }
    
    public function acceuilAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            $this->redirect($this->generateUrl('index'));
        }
        /* @var $user \Walva\UserBundle\Entity\User */
        if ($user->isAdmin())
            return $this->redirect($this->generateUrl('evenement'));
        return $this->redirect($this->generateUrl('public_evenement'));
    }

    public function profilAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /* @var $user \Walva\UserBundle\Entity\User */
        return $this->render('WalvaNatagoraBundle:User:profil.html.twig', array(
                    'user' => $user,
                    'entity' => $user->getEleve(),
                ));
    }

    public function clarolineAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $eleve = $user->getEleve();
        /* @var $eleve \Walva\NatagoraBundle\Entity\Eleve */
        if (isset($eleve)) {
            return $this->render('WalvaNatagoraBundle:User:claroline.html.twig', array(
                        'login' => $eleve->getClLogin(),
                        'password' => $eleve->getClPassword(),
                    ));
        }
    }

}