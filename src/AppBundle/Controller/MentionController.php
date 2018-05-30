<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mention controller.
 *
 * @Route("mention")
 */
class MentionController extends Controller
{
    /**
     * Lists all mention entities.
     *
     * @Route("/", name="mention_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mentions = $em->getRepository('AppBundle:Mention')->findAll();

        return $this->render('mention/index.html.twig', array(
            'mentions' => $mentions,
        ));
    }

    /**
     * Creates a new mention entity.
     *
     * @Route("/new/{ecole}", name="mention_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $ecole)
    {
        $mention = new Mention();
        $form = $this->createForm('AppBundle\Form\MentionType', $mention, array('ecole' => $ecole ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mention);
            $em->flush();

            return $this->redirectToRoute('mention_index');
        }

        return $this->render('mention/new.html.twig', array(
            'mention' => $mention,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mention entity.
     *
     * @Route("/{id}", name="mention_show")
     * @Method("GET")
     */
    public function showAction(Mention $mention)
    {
        $deleteForm = $this->createDeleteForm($mention);

        return $this->render('mention/show.html.twig', array(
            'mention' => $mention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mention entity.
     *
     * @Route("/{id}/edit", name="mention_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Mention $mention)
    {
        //$em = $this->getDoctrine()->getManager(); dump($mention->getFiliere()->getEcole()); die();
        $ecole = $mention->getFiliere()->getEcole()->getId();
        $deleteForm = $this->createDeleteForm($mention);
        $editForm = $this->createForm('AppBundle\Form\MentionType', $mention, array('ecole' => $ecole ));
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mention_index');
        }

        return $this->render('mention/edit.html.twig', array(
            'mention' => $mention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mention entity.
     *
     * @Route("/{id}", name="mention_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Mention $mention)
    {
        $form = $this->createDeleteForm($mention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mention);
            $em->flush();
        }

        return $this->redirectToRoute('mention_index');
    }

    /**
     * Creates a form to delete a mention entity.
     *
     * @param Mention $mention The mention entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mention $mention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mention_delete', array('id' => $mention->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
