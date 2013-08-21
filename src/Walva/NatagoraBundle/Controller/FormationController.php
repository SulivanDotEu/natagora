<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Walva\NatagoraBundle\Entity\Formation;
use Walva\NatagoraBundle\Form\FormationType;

/**
 * Formation controller.
 *
 */
class FormationController extends Controller
{

    /**
     * Lists all Formation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaNatagoraBundle:Formation')->findAll();

        return $this->render('WalvaNatagoraBundle:Formation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Formation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Formation();
        $form = $this->createForm(new FormationType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('formation_show', array('id' => $entity->getId())));
        }

        return $this->render('WalvaNatagoraBundle:Formation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Formation entity.
     *
     */
    public function newAction()
    {
        $entity = new Formation();
        $form   = $this->createForm(new FormationType(), $entity);

        return $this->render('WalvaNatagoraBundle:Formation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Formation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Formation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Formation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Formation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Formation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $editForm = $this->createForm(new FormationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Formation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Formation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Formation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Formation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FormationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('formation_edit', array('id' => $id)));
        }

        return $this->render('WalvaNatagoraBundle:Formation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Formation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WalvaNatagoraBundle:Formation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Formation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('formation'));
    }

    /**
     * Creates a form to delete a Formation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
