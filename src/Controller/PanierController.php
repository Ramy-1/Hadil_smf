<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Panier;


class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="app_panier")
     */
    public function index(): Response
    {

        // $repository = $this->getDoctrine()->getRepository(Plat::class);
        // $panier = $repository->find($id);
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }
    /**
     * @Route("/panier/{id}", name="user_panier")
     */
    public function panier($id): Response
    {

        $repository = $this->getDoctrine()->getRepository(Panier::class);
        $panier = $repository->findOneBy(['idUser' => $id]);

        $tab = $panier->getCommands()->toArray();
        return $this->render('panier/index.html.twig', [
            'tab' => $tab,
        ]);
    }
}
