<?php

namespace AppBundle\Controller\Impression;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaquetteController extends Controller
{
    /**
     * @Route("/impression/maquette", name="impression_maquette")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ecoles = $em->getRepository('AppBundle:Ecole')->findAll();
        $filieres = $em->getRepository('AppBundle:Filiere')->findAll();
        $mentions = $em->getRepository('AppBundle:Mention')->findAll();
        $parcours = $em->getRepository('AppBundle:Parcours')->findAll();


        
        return $this->render('etats/maquette.html.twig', [
            'ecoles' => $ecoles,
            'filieres' => $filieres,
            'mentions' => $mentions,
            'parcours' => $parcours,
        ]);
    }

    
}
