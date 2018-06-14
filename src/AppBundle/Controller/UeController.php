<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ue controller.
 *
 * @Route("ue")
 */
class UeController extends Controller
{
    /**
     * Lists all ue entities.
     *
     * @Route("/{ecole}", name="ue_index")
     * @Method("GET")
     */
    public function indexAction($ecole)
    {
        $em = $this->getDoctrine()->getManager();

        $ues = $em->getRepository('AppBundle:Ue')->findUeByEcole($ecole);

        return $this->render('ue/index.html.twig', array(
            'ues' => $ues,
        ));
    }

    /**
     * Creates a new ue entity.
     *
     * @Route("/new/{ecole}", name="ue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $ecole)
    {
        $ue = new Ue();
        $form = $this->createForm('AppBundle\Form\UeType', $ue, array('ecole'=>$ecole));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ue);
            $em->flush();

            return $this->redirectToRoute('ue_new', array('ecole' => $ecole));
        }
        $em = $this->getDoctrine()->getManager();

        $ues = $em->getRepository('AppBundle:Ue')->findUeByEcole($ecole);


        return $this->render('ue/new.html.twig', array(
            'ue' => $ue,
              'ues' => $ues,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ue entity.
     *
     * @Route("/{id}", name="ue_show")
     * @Method("GET")
     */
    public function showAction(Ue $ue)
    {
        $deleteForm = $this->createDeleteForm($ue);

        return $this->render('ue/show.html.twig', array(
            'ue' => $ue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ue entity.
     *
     * @Route("/{id}/edit", name="ue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ue $ue)
    {
        $deleteForm = $this->createDeleteForm($ue);
        $editForm = $this->createForm('AppBundle\Form\UeType', $ue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ue_edit', array('id' => $ue->getId()));
        }

        return $this->render('ue/edit.html.twig', array(
            'ue' => $ue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ue entity.
     *
     * @Route("/{id}", name="ue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ue $ue)
    {
        $form = $this->createDeleteForm($ue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ue);
            $em->flush();
        }

        return $this->redirectToRoute('ue_index');
    }

    /**
     * Creates a form to delete a ue entity.
     *
     * @param Ue $ue The ue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ue $ue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ue_delete', array('id' => $ue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Choix de l'ecole.
     *
     * @Route("/ecole/choix/", name="ue_ecole")
     * @Method("GET")
     */
     public function ecoleAction(){
       $em = $this->getDoctrine()->getManager();
       $ecoles = $em->getRepository('AppBundle:Ecole')->findAll();

       return $this->render('ue/ecole.html.twig', array(
         'ecoles' =>$ecoles,
       ));
     }


}
