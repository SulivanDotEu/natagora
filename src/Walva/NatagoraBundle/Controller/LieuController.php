<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Walva\NatagoraBundle\Entity\Lieu;
use Walva\NatagoraBundle\Form\LieuType;

/**
 * Lieu controller.
 *
 */
class LieuController extends Controller
{

    /**
     * Lists all Lieu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaNatagoraBundle:Lieu')->findAll();

        return $this->render('WalvaNatagoraBundle:Lieu:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Lieu entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Lieu();
        $form = $this->createForm(new LieuType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lieu_show', array('id' => $entity->getId())));
        }

        return $this->render('WalvaNatagoraBundle:Lieu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Lieu entity.
     *
     */
    public function newAction()
    {
        $entity = new Lieu();
        $form   = $this->createForm(new LieuType(), $entity);

        return $this->render('WalvaNatagoraBundle:Lieu:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Lieu entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Lieu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lieu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Lieu:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Lieu entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Lieu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lieu entity.');
        }

        $editForm = $this->createForm(new LieuType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Lieu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Lieu entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Lieu')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lieu entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LieuType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lieu_edit', array('id' => $id)));
        }

        return $this->render('WalvaNatagoraBundle:Lieu:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Lieu entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WalvaNatagoraBundle:Lieu')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lieu entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lieu'));
    }

    /**
     * Creates a form to delete a Lieu entity by id.
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
