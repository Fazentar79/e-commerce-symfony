<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    #[Route('/produit/{slug}', name: 'app_product')]
    public function index($slug, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }
}