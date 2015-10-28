<?php

namespace ParkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ParkBundle\Entity\Computer;
use ParkBundle\Form\ComputerType;

/**
 * Computer controller.
 */
class ComputerController extends Controller
{

    /**
     * Lists all computers.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $computers = $em->getRepository('ParkBundle:Computer')->findAll();

        return $this->render('ParkBundle:Computer:index.html.twig', array(
            'computers' => $computers,
        ));
    }
    /**
     * Creates a new computer.
     */
    public function createAction(Request $request)
    {
        $computer   = new Computer();
        $createForm = $this->createCreateForm($computer);
        $createForm->handleRequest($request);

        if ($createForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($computer);
            $em->flush();

            return $this->redirect($this->generateUrl('computer_show', array('id' => $computer->getId())));
        }

        return $this->render('ParkBundle:Computer:new.html.twig', array(
            'computer'    => $computer,
            'create_form' => $createForm->createView()
        ));
    }

    /**
     * Creates a form to create a computer.
     *
     * @param Computer $computer
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createCreateForm(Computer $computer)
    {
        $createForm = $this->createForm('form_computer', $computer, array(
            'action' => $this->generateUrl('computer_create'),
            'method' => 'POST',
        ));

        $createForm->add('submit', 'submit', array('label' => 'Create'));

        return $createForm;
    }

    /**
     * Displays a form to create a new computer.
     */
    public function newAction()
    {
        $computer   = new Computer();
        $createForm = $this->createCreateForm($computer);

        return $this->render('ParkBundle:Computer:new.html.twig', array(
            'computer'    => $computer,
            'create_form' => $createForm->createView()
        ));
    }

    /**
     * Finds and displays a computer.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $computer = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$computer) {
            throw $this->createNotFoundException('Unable to find computer.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ParkBundle:Computer:show.html.twig', array(
            'computer'      => $computer,
            'delete_form'   => $deleteForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing computer.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $computer = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$computer) {
            throw $this->createNotFoundException('Unable to find computer.');
        }

        $editForm   = $this->createEditForm($computer);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ParkBundle:Computer:edit.html.twig', array(
            'computer'    => $computer,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
    * Creates a form to edit a Computer entity.
    *
    * @param Computer $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Computer $entity)
    {
        $editForm = $this->createForm('form_computer', $entity, array(
            'action' => $this->generateUrl('computer_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));

        return $editForm;
    }
    /**
     * Edits an existing Computer entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $computer = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$computer) {
            throw $this->createNotFoundException('Unable to find Computer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($computer);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('computer_edit', array('id' => $id)));
        }

        return $this->render('ParkBundle:Computer:edit.html.twig', array(
            'computer'    => $computer,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }
    /**
     * Deletes a Computer entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $computer = $em->getRepository('ParkBundle:Computer')->find($id);

        if (!$computer) {
            throw $this->createNotFoundException('Unable to find Computer entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);
        if ($deleteForm->isValid()) {

            $em->remove($computer);
            $em->flush();

            return $this->redirect($this->generateUrl('computer'));
        }

        return $this->render('ParkBundle:Computer:delete.html.twig', array(
            'computer'    => $computer,
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Creates a form to delete a Computer entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('computer_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
