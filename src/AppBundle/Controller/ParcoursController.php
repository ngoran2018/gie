<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parcours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Parcour controller.
 *
 * @Route("parcours")
 */
class ParcoursController extends Controller
{
    /**
     * Lists all parcour entities.
     *
     * @Route("/", name="parcours_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parcours = $em->getRepository('AppBundle:Parcours')->findAll();

        return $this->render('parcours/index.html.twig', array(
            'parcours' => $parcours,
        ));
    }

    /**
     * Creates a new parcour entity.
     *
     * @Route("/new", name="parcours_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parcours = new Parcours();
        $form = $this->createForm('AppBundle\Form\ParcoursType', $parcours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $parcours->setAbrevparcours(strtoupper($parcours->getAbrevparcours()));
            $em->persist($parcours);
            $em->flush();

            return $this->redirectToRoute('parcours_index', array('id' => $parcours->getId()));
        }

        return $this->render('parcours/new.html.twig', array(
            'parcour' => $parcours,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a parcour entity.
     *
     * @Route("/{id}", name="parcours_show")
     * @Method("GET")
     */
    public function showAction(Parcours $parcours)
    {
        $deleteForm = $this->createDeleteForm($parcours);

        return $this->render('parcours/show.html.twig', array(
            'parcour' => $parcours,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing parcour entity.
     *
     * @Route("/{id}/edit", name="parcours_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parcours $parcours)
    {
        $deleteForm = $this->createDeleteForm($parcours);
        $editForm = $this->createForm('AppBundle\Form\ParcoursType', $parcours);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parcours_index');
        }

        return $this->render('parcours/edit.html.twig', array(
            'parcours' => $parcours,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a parcour entity.
     *
     * @Route("/{id}", name="parcours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Parcours $parcours)
    {
        $form = $this->createDeleteForm($parcours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parcours);
            $em->flush();
        }

        return $this->redirectToRoute('parcours_index');
    }

    /**
     * Creates a form to delete a parcour entity.
     *
     * @param Parcours $parcour The parcour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parcours $parcours)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parcours_delete', array('id' => $parcours->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
