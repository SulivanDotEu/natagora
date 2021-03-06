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
class EvenementController extends Controller {

// src/Sdz/BlogBundle/Controller/BlogController.php

    public function traductionAction($name) {
        return $this->render('WalvaNatagoraBundle:Evenement:traduction.html.twig', array(
                    'name' => $name
                ));
    }

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
        

        return $this->render('WalvaNatagoraBundle:Evenement:index.html.twig', array(
                    'entities' => $entities,
                ));
    }

    public function listDeletedEntitiesAction($sort = null, $order = 'ASC'){
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaNatagoraBundle:Evenement')->findAllDeleted();
        if ($sort != null) {
            $comparator = new ObjectComparator();
            $entities = $comparator->sort($entities, $sort, $order);
        }

        return $this->render('WalvaNatagoraBundle:Evenement:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Evenement entity.
     * 
     */
    public function createAction(Request $request) {
        $entity = new Evenement();
        $form = $this->createForm(new EvenementType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('evenement_show', array('id' => $entity->getId())));
        }

        return $this->render('WalvaNatagoraBundle:Evenement:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                ));
    }

    /**
     * Displays a form to create a new Evenement entity.
     * 
     */
    public function newAction() {
        $entity = new Evenement();
        $form = $this->createForm(new EvenementType(), $entity);

        return $this->render('WalvaNatagoraBundle:Evenement:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
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
        //$entity->updatePosition();

        return $this->render('WalvaNatagoraBundle:Evenement:show.html.twig', array(
                    'entity' => $entity,
                    ));
    }

    /**
     * Displays a form to edit an existing Evenement entity.
     * 
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Evenement')->find($id);
        /* @var $entity Evenement */
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evenement entity.');
        }

        $editForm = $this->createForm(new EvenementType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Evenement:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing Evenement entity.
     * 
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Evenement')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Evenement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EvenementType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            //die();

            $submit = $this->getRequest()->request->get('submit');
            if ($submit == 'show') {
                return $this->redirect($this->generateUrl('evenement_show', array('id' => $entity->getId())));
            } else if ($submit == 'list') {
                return $this->redirect($this->generateUrl('evenement'));
            } else if ($submit == 'edit') {
                return $this->redirect($this->generateUrl('evenement_edit', array('id' => $id)));
            }

            return $this->redirect($this->generateUrl('evenement_edit', array('id' => $id)));
        }

        return $this->render('WalvaNatagoraBundle:Evenement:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a Evenement entity.
     * 
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WalvaNatagoraBundle:Evenement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Evenement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('evenement'));
    }

    /**
     * Creates a form to delete a Evenement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

}
