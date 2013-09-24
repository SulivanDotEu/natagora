<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Walva\NatagoraBundle\Entity\Evenement;
use Walva\NatagoraBundle\Form\EvenementType;
use \Walva\NatagoraBundle\Plugin\ObjectComparator;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
/**
 * Evenement controller.
 *
 */
class PublicEvenementController extends Controller {

    /**
     * Lists all Evenement entities.
     *
     */
    public function indexAction($sort = null, $order = 'ASC') {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT e FROM WalvaNatagoraBundle:Evenement e
            WHERE e.date > :date')
                ->setParameter('date', new \DateTime('NOW'));
        
        

        $entities = $query->getResult();
        //$entities = $em->getRepository('WalvaNatagoraBundle:Evenement')->myFindAll();
        if ($sort != null) {
            $comparator = new ObjectComparator();
            $entities = $comparator->sort($entities, $sort, $order);
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }

        $listEvenements = array();
        foreach ($entities as $entity) {
            /* @var $entity Evenement */
            if ($entity->estConcerne($user->getEleve())) {
                $listEvenements[] = $entity;
                $entity->setEleveFocus($user->getEleve());
            }
        }

        return $this->render('WalvaNatagoraBundle:Evenement:public\index.html.twig', array(
                    'entities' => $listEvenements,
                ));
    }

    /**
     * Finds and displays a Evenement entity.
     * 
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        /* @var $user User */
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                    'Problem...');
        }

        $entity = $em->getRepository('WalvaNatagoraBundle:Evenement')->find($id);
        $entity->setEleveFocus($user->getEleve());
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evenement entity.');
        }
        $entity->getDate();
        //$entity->updatePosition();


        return $this->render('WalvaNatagoraBundle:Evenement:public\show.html.twig', array(
                    'entity' => $entity,
                ));
    }

}
