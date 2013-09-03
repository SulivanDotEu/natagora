<?php

namespace Walva\NatagoraBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Walva\NatagoraBundle\Entity\Eleve;
use Walva\NatagoraBundle\Form\EleveType;

/**
 * Eleve controller.
 *
 */
class EleveController extends Controller
{

    /**
     * Lists all Eleve entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WalvaNatagoraBundle:Eleve')->findAll();

        return $this->render('WalvaNatagoraBundle:Eleve:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Eleve entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Eleve();
        $form = $this->createForm(new EleveType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eleve_show', array('id' => $entity->getId())));
        }

        return $this->render('WalvaNatagoraBundle:Eleve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Eleve entity.
     *
     */
    public function newAction()
    {
        $entity = new Eleve();
        $form   = $this->createForm(new EleveType(), $entity);

        return $this->render('WalvaNatagoraBundle:Eleve:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Eleve entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Eleve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eleve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Eleve:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Eleve entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Eleve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eleve entity.');
        }

        $editForm = $this->createForm(new EleveType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WalvaNatagoraBundle:Eleve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Eleve entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WalvaNatagoraBundle:Eleve')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Eleve entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new EleveType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eleve_edit', array('id' => $id)));
        }

        return $this->render('WalvaNatagoraBundle:Eleve:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Eleve entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WalvaNatagoraBundle:Eleve')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Eleve entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eleve'));
    }

    /**
     * Creates a form to delete a Eleve entity by id.
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
