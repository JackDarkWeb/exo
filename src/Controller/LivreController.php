<?php

namespace App\Controller;

use App\Entity\Livres;
use App\Repository\LivresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class LivreController extends AbstractController
{
    /**
     * @Route("/", name="livre")
     * @Template
     */
    public function indexAction()
    {
        return [
            'text' => "Fonctionne"
        ];
    }
    /**
     * @Route("/livre/{id}", name="show.livre", requirements={"id" = "^[0-9]+$"})
     * @Template
     */
    public function showAction($id)
    {

    }
    /**
     * @Route("/livre/insert", name="insert.livre")
     * @Template
     */
    public function insertAction(){
       $livre = new Livres();

       $livre->setTitle('La ferme des animaux');
       $livre->setCreatedAt(new \DateTime('1945-07-17'));

       $em = $this->getDoctrine()->getManager();
       $em->persist($livre);

       $em->flush();

       return new Response($livre->getId() ." was been inserted");
    }

    /**
     * @Route("/livre/update/{id}", name="update.livre", requirements={"id" = "^[0-9]+$"})
     * @Template
     */
    public function updateAction(){

    }
}
