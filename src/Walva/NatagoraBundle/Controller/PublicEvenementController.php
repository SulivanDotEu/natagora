<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Walva\NatagoraBundle\Entity\Evenement;
use Walva\NatagoraBundle\Form\EvenementType;
use \Walva\NatagoraBundle\Plugin\ObjectComparator;

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

        $entities = $em->getRepository('WalvaNatagoraBundle:Evenement')->myFindAll();
        if ($sort != null) {
            $comparator = new ObjectComparator();
            $entities = $comparator->sort($entities, $sort, $order);
        }
        

        return $this->render('WalvaNatagoraBundle:Evenement:public\index.html.twig', array(
                    'entities' => $entities,
                ));
    }

  
    /**
     * Finds and displays a Evenement entity.
     * 
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Evenement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evenement entity.');
        }
        $entity->getDate();
        //var_dump($entity->getInscriptions());
        //$entity->updatePosition();

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Evenement:show.html.twig', array(
                    'entity' => $entity,
                    ));
    }




}
