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
        $filieres = $em->getRepository('AppBundle:Filiere')->findFiliereByFormation('LMD');
        $mentions = $em->getRepository('AppBundle:Mention')->findAll();
        $parcours = $em->getRepository('AppBundle:Parcours')->findAll();
    
        return $this->render('etats/maquette.html.twig', [
            'ecoles' => $ecoles,
            'filieres' => $filieres,
            'mentions' => $mentions,
            'parcours' => $parcours,
        ]);
    }

   /**
    * Creation fonction pour filtrer la filière selon l'école
    *
    * @Route("/filtre-filiere/", name="filtre_filiere")
    */
    public function filtrefiliereAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $ecoleId = $request->get('idEcole');
        $filieres = $em->getRepository('AppBundle:Filiere')
                        ->findFiliere($ecoleId)
                        ->getQuery()->getResult()
                        ;
         return $this->render('etats/filtre_filiere.html.twig', [
            'filieres' => $filieres,
  
        ]);
    } 

    /**
    * Creation fonction pour filtrer la mention selon la filière
    *
    * @Route("/filtre/mention/", name="filtre_mention")
    */
    public function filtrementionAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $filiereId = $request->get('idFiliere');
        $mentions = $em->getRepository('AppBundle:Mention')
                        ->findMentionByFiliere($filiereId)
                        ;
         return $this->render('etats/filtre_mention.html.twig', [
            'mentions' => $mentions,
  
        ]);
    } 

     /**
    * Creation fonction pour filtrer les parcours selon la Mention
    *
    * @Route("/filtre/parcours/", name="filtre_parcours")
    */
    public function filtreparcoursAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $mentionId = $request->get('idMention');
        $parcours = $em->getRepository('AppBundle:Parcours')
                        ->findParcoursByMention($mentionId)
                        ;
         return $this->render('etats/filtre_parcours.html.twig', [
            'parcours' => $parcours,
  
        ]);
    } 
}
