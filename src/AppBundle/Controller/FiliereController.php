<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Filiere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Filiere controller.
 *
 * @Route("filiere")
 */
class FiliereController extends Controller
{
    /**
     * Lists all filiere entities.
     *
     * @Route("/", name="filiere_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $filieres = $em->getRepository('AppBundle:Filiere')->findAll();

        return $this->render('filiere/index.html.twig', array(
            'filieres' => $filieres,
        ));
    }

    /**
     * Creates a new filiere entity.
     *
     * @Route("/new", name="filiere_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $filiere = new Filiere();
        $form = $this->createForm('AppBundle\Form\FiliereType', $filiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($filiere);
            $em->flush();

            return $this->redirectToRoute('filiere_index');
        }

        return $this->render('filiere/new.html.twig', array(
            'filiere' => $filiere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a filiere entity.
     *
     * @Route("/{id}", name="filiere_show")
     * @Method("GET")
     */
    public function showAction(Filiere $filiere)
    {
        $deleteForm = $this->createDeleteForm($filiere);

        return $this->render('filiere/show.html.twig', array(
            'filiere' => $filiere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing filiere entity.
     *
     * @Route("/{id}/edit", name="filiere_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Filiere $filiere)
    {
        $deleteForm = $this->createDeleteForm($filiere);
        $editForm = $this->createForm('AppBundle\Form\FiliereType', $filiere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('filiere_index');
        }

        return $this->render('filiere/edit.html.twig', array(
            'filiere' => $filiere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a filiere entity.
     *
     * @Route("/{id}", name="filiere_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Filiere $filiere)
    {
        $form = $this->createDeleteForm($filiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($filiere);
            $em->flush();
        }

        return $this->redirectToRoute('filiere_index');
    }

    /**
     * Creates a form to delete a filiere entity.
     *
     * @param Filiere $filiere The filiere entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Filiere $filiere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('filiere_delete', array('id' => $filiere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
