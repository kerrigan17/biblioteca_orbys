<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    private $bookRepository;
    private $imageRepository;

    public function __construct(BookRepository $bookRepository, ImageRepository $imageRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * @Route("/books", name="books_list")
     */
    public function list(): Response
    {
        $books = $this->bookRepository->findAll();
        return $this->json([
            'data' => $books
        ]);
    }

    /**
     * @Route("/books/category/{category}", name="books_by_category")
     */
    public function showByCategory(string $category): Response
    {
        $books = $this->bookRepository->findByCategory($category);
        return $this->json([
            'data' => $books
        ]);
    }
}
