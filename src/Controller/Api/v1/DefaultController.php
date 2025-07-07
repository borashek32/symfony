<?php

namespace App\Controller\Api\v1;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Route('/', name: 'blog_default')]
    public function index(BlogRepository $blogRepository, EntityManagerInterface $em): Response
    {
        $post1 = $blogRepository->findOneBy(['id' => 1]);
        $post1->setTitle('Second post');
        $em->flush();
        dd($post1);

        $blog = (new Blog())
            ->setTitle('The first post')
            ->setText('the first text');
        $em->persist($blog);
        $em->flush();

        return $this->render('main/index.html.twig', []);
    }
}