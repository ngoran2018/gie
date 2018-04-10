<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tformation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tformation controller.
 *
 * @Route("admin/tformation")
 */
class TformationController extends Controller
{
    /**
     * Lists all tformation entities.
     *
     * @Route("/", name="admin_tformation_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
      $tformation = new Tformation();
      $form = $this->createForm('AppBundle\Form\TformationType', $tformation);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($tformation);
          $em->flush();

          return $this->redirectToRoute('admin_tformation_index');
      }

        $em = $this->getDoctrine()->getManager();

        $tformations = $em->getRepository('AppBundle:Tformation')->findAll();

        return $this->render('tformation/index.html.twig', array(
            'tformations' => $tformations,
            'tformation' => $tformation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new tformation entity.
     *
     * @Route("/new", name="admin_tformation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tformation = new Tformation();
        $form = $this->createForm('AppBundle\Form\TformationType', $tformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tformation);
            $em->flush();

            return $this->redirectToRoute('admin_tformation_show', array('id' => $tformation->getId()));
        }

        return $this->render('tformation/new.html.twig', array(
            'tformation' => $tformation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tformation entity.
     *
     * @Route("/{id}", name="admin_tformation_show")
     * @Method("GET")
     */
    public function showAction(Tformation $tformation)
    {
        $deleteForm = $this->createDeleteForm($tformation);

        return $this->render('tformation/show.html.twig', array(
            'tformation' => $tformation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tformation entity.
     *
     * @Route("/{id}/edit", name="admin_tformation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tformation $tformation)
    {
        $deleteForm = $this->createDeleteForm($tformation);
        $editForm = $this->createForm('AppBundle\Form\TformationType', $tformation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_tformation_edit', array('id' => $tformation->getId()));
        }

        return $this->render('tformation/edit.html.twig', array(
            'tformation' => $tformation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tformation entity.
     *
     * @Route("/{id}", name="admin_tformation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tformation $tformation)
    {
        $form = $this->createDeleteForm($tformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tformation);
            $em->flush();
        }

        return $this->redirectToRoute('admin_tformation_index');
    }

    /**
     * Creates a form to delete a tformation entity.
     *
     * @param Tformation $tformation The tformation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tformation $tformation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tformation_delete', array('id' => $tformation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
