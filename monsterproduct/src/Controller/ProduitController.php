<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="produit")
     */
    public function index(ProduitRepository $produitRepository): Response
    {

        $produit = $produitRepository->findTop(Produit::NB_HOME);
        return $this->render('produit/index.html.twig', [
            'produit' => $produit,
        ]);
    }


    /**
     * @Route("/produit/{id}", name="show")
     */
    public function show(Produit $produit)
    {

        return $this->render('produit/show.html.twig', ['produit' => $produit]);
    }

    /**
     * @Route("/produit", name="tousProduits")
     */

    public function produit(ProduitRepository $repo): Response
    {

        $produit = $repo->findAll();

        return $this->render('produit/produit.html.twig', [
            'controller_name' => 'ProduitController',
            'produit' => $produit
        ]);
    }
}
