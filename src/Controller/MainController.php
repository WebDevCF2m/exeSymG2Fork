<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Section;

// 😊😊
class MainController extends AbstractController
{
    # contient notre menu
    private array $menu;
    # contient l'EntityManagerInterface
    private EntityManagerInterface $em;

    // initialise les valeurs des attributes
    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
        $this->menu = $this->em->getRepository(Section::class)->findAll();
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'menu' => $this->menu,
        ]);
    }
}
