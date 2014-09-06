<?php

namespace Walva\NatagoraBundle\Controller;

use FOS\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Response;
use Walva\NatagoraBundle\Entity\Evenement;
use Walva\NatagoraBundle\Form\ProfileType;
use Walva\UserBundle\Form\Type\RegistrationFormType;

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
        $user = $this->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /* @var $user \Walva\UserBundle\Entity\User */
        return $this->render('WalvaNatagoraBundle:User:profil.html.twig', array(
                    'user' => $user,
                    'entity' => $user->getEleve(),
                ));
    }

    public function editProfileAction(Request $request){
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $type = new RegistrationFormType('Walva\UserBundle\Entity\User');

        $editForm = $this->createForm($type, $user);
        $editForm->add('submit', 'submit');
        $editForm->remove('plainPassword');

        $editForm->handleRequest($request);
        if($editForm->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('natagora_user_profil'));
        }

        return $this->render('WalvaNatagoraBundle:User:edit_profil.html.twig', array(
            'user' => $user,
            'entity' => $user->getEleve(),
            'form' => $editForm->createView()
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