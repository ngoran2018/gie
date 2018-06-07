<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Typeue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typeue controller.
 *
 * @Route("typeue")
 */
class TypeueController extends Controller
{
    /**
     * Lists all typeue entities.
     *
     * @Route("/", name="typeue_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
      $typeue = new Typeue();
      $form = $this->createForm('AppBundle\Form\TypeueType', $typeue);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $libelle = strtoupper($typeue->getLibtypeue());
          $typeue->setLibtypeue($libelle);
          $em->persist($typeue);
          $em->flush();

          return $this->redirectToRoute('typeue_index', array('id' => $typeue->getId()));
      }

        $em = $this->getDoctrine()->getManager();

        $typeues = $em->getRepository('AppBundle:Typeue')->findAll();

        return $this->render('typeue/index.html.twig', array(
            'typeues' => $typeues,
            'typeue' => $typeue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new typeue entity.
     *
     * @Route("/new", name="typeue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeue = new Typeue();
        $form = $this->createForm('AppBundle\Form\TypeueType', $typeue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeue);
            $em->flush();

            return $this->redirectToRoute('typeue_show', array('id' => $typeue->getId()));
        }

        return $this->render('typeue/new.html.twig', array(
            'typeue' => $typeue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeue entity.
     *
     * @Route("/{id}", name="typeue_show")
     * @Method("GET")
     */
    public function showAction(Typeue $typeue)
    {
        $deleteForm = $this->createDeleteForm($typeue);

        return $this->render('typeue/show.html.twig', array(
            'typeue' => $typeue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeue entity.
     *
     * @Route("/{id}/edit", name="typeue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Typeue $typeue)
    {
        $deleteForm = $this->createDeleteForm($typeue);
        $editForm = $this->createForm('AppBundle\Form\TypeueType', $typeue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $libelle = strtoupper($typeue->getLibtypeue());
            $typeue->setLibtypeue($libelle);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeue_edit', array('id' => $typeue->getId()));
        }
            $em = $this->getDoctrine()->getManager();
            $typeues = $em->getRepository('AppBundle:Typeue')->findAll();

        return $this->render('typeue/edit.html.twig', array(
            'typeue' => $typeue,
            'typeues' => $typeues,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeue entity.
     *
     * @Route("/{id}", name="typeue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Typeue $typeue)
    {
        $form = $this->createDeleteForm($typeue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeue);
            $em->flush();
        }

        return $this->redirectToRoute('typeue_index');
    }

    /**
     * Creates a form to delete a typeue entity.
     *
     * @param Typeue $typeue The typeue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Typeue $typeue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeue_delete', array('id' => $typeue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
