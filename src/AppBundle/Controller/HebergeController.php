<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Heberge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Heberge controller.
 *
 * @Route("admin/heberge")
 */
class HebergeController extends Controller
{
    /**
     * Lists all heberge entities.
     *
     * @Route("/", name="admin_heberge_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $heberge = new Heberge();
        $form = $this->createForm('AppBundle\Form\HebergeType', $heberge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($heberge);
            $em->flush();
  
            $this->addFlash('notice', "L'hébergement ".$heberge->getLibheberge()." a été créée avec succès");
  
            return $this->redirectToRoute('admin_heberge_index');
        }

        $em = $this->getDoctrine()->getManager();

        $heberges = $em->getRepository('AppBundle:Heberge')->findAll();

        return $this->render('heberge/index.html.twig', array(         
            'heberges' => $heberges,
            'heberge' => $heberge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new heberge entity.
     *
     * @Route("/new", name="admin_heberge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $heberge = new Heberge();
        $form = $this->createForm('AppBundle\Form\HebergeType', $heberge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($heberge);
            $em->flush();

            return $this->redirectToRoute('admin_heberge_show', array('id' => $heberge->getId()));
        }

        return $this->render('heberge/new.html.twig', array(
            'heberge' => $heberge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a heberge entity.
     *
     * @Route("/{id}", name="admin_heberge_show")
     * @Method("GET")
     */
    public function showAction(Heberge $heberge)
    {
        $deleteForm = $this->createDeleteForm($heberge);

        return $this->render('heberge/show.html.twig', array(
            'heberge' => $heberge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing heberge entity.
     *
     * @Route("/{id}/edit", name="admin_heberge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Heberge $heberge)
    {
        $deleteForm = $this->createDeleteForm($heberge);
        $editForm = $this->createForm('AppBundle\Form\HebergeType', $heberge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_heberge_index');
        }
        $em = $this->getDoctrine()->getManager();

        $heberges = $em->getRepository('AppBundle:Heberge')->findAll();


        return $this->render('heberge/edit.html.twig', array(
            'heberge' => $heberge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'heberges' => $heberges,
        ));
    }

    /**
     * Deletes a heberge entity.
     *
     * @Route("/{id}", name="admin_heberge_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Heberge $heberge)
    {
        $form = $this->createDeleteForm($heberge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($heberge);
            $em->flush();
        }

        return $this->redirectToRoute('admin_heberge_index');
    }

    /**
     * Creates a form to delete a heberge entity.
     *
     * @param Heberge $heberge The heberge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Heberge $heberge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_heberge_delete', array('id' => $heberge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
