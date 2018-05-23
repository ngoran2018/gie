<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/admin/mention", name="admin_mention")
     */
    public function ecoleAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $ecoles = $em->getRepository('AppBundle:Ecole')->findListEcole();
        // replace this example code with whatever you need
        return $this->render('mention/ecole.html.twig', [
            'ecoles' => $ecoles,
        ]);
    }


}
