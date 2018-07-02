<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ecue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ecue controller.
 *
 * @Route("ecue")
 */
class EcueController extends Controller
{
    /**
     * Lists all ecue entities.
     *
     * @Route("/", name="ecue_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ecues = $em->getRepository('AppBundle:Ecue')->findAll();

        return $this->render('ecue/index.html.twig', array(
            'ecues' => $ecues,
            'ecue' => $ecue,

        ));
    }

    /**
     * Creates a new ecue entity.
     *
     * @Route("/new/{ue}", name="ecue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $ue)
    {
        $ecue = new Ecue();
        $form = $this->createForm('AppBundle\Form\EcueType', $ecue, array('ue'=>$ue));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ecue);
            $em->flush();

            return $this->redirectToRoute('ecue_new', array('ue' => $ecue->getId()));
        }
        $em = $this->getDoctrine()->getManager();

        $ecues = $em->getRepository('AppBundle:Ecue')->findBy(array('ue' =>$ue));

        return $this->render('ecue/new.html.twig', array(
            'ecue' => $ecue,
            'ecues' => $ecues,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ecue entity.
     *
     * @Route("/{id}", name="ecue_show")
     * @Method("GET")
     */
    public function showAction(Ecue $ecue)
    {
        $deleteForm = $this->createDeleteForm($ecue);

        return $this->render('ecue/show.html.twig', array(
            'ecue' => $ecue,
            'ecues' => $ecues,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ecue entity.
     *
     * @Route("/{id}/edit", name="ecue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ecue $ecue)
    {
        $deleteForm = $this->createDeleteForm($ecue);
        $editForm = $this->createForm('AppBundle\Form\EcueType', $ecue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecue_edit', array('id' => $ecue->getId()));
        }

        return $this->render('ecue/edit.html.twig', array(
            'ecue' => $ecue,
            'ecues' => $ecues,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ecue entity.
     *
     * @Route("/{id}", name="ecue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ecue $ecue)
    {
        $form = $this->createDeleteForm($ecue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ecue);
            $em->flush();
        }

        return $this->redirectToRoute('ecue_index');
    }

    /**
     * Creates a form to delete a ecue entity.
     *
     * @param Ecue $ecue The ecue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ecue $ecue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecue_delete', array('id' => $ecue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
