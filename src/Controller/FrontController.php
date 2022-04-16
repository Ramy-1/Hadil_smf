<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Plat;
use App\Entity\Panier;
use App\Entity\Command;
use SebastianBergmann\Environment\Console;

/**
 * @Route("/frontt")
 */
class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_front")
     */
    public function index(): Response
    {
        $tab = $this->getDoctrine()
            ->getRepository(Plat::class)
            ->findAll();

        return $this->render('front/index.html.twig', [
            'tab' => $tab,
        ]);
    }

    /**
     *  @Route("/newplat/{id}", name="AddPlatToPanier")
     */
    public function AjoutPlat($id, Request $request): Response
    {
        $command = new Command();

        $repository = $this->getDoctrine()->getRepository(Plat::class);
        $plat = $repository->find($id);

        $command->setIdUser(0);
        $command->setPlat($plat);
        $command->setPrix($plat->getPrix());
        $command->setDescription($plat->getDescription());

        $em = $this->getDoctrine()->getManager();

        
        
        $repository = $this->getDoctrine()->getRepository(Panier::class);
        $panier = $repository->findOneBy(['idUser' => 0]);
        $panier->addCommand($command);
        
        $em->persist($command);
        $em->flush();
        return $this->redirectToRoute('app_panier');
    }
     /**
     * @Route("/panier/{id}", name="front_panier")
     */
    public function panier($id): Response
    {

        $repository = $this->getDoctrine()->getRepository(Panier::class);
        $panier = $repository->findOneBy(['idUser' => $id]);

        $tab = $panier->getCommands()->toArray();
        return $this->render('front/panier.html.twig', [
            'tab' => $tab,
        ]);
    }
}
