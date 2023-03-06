<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        $users = [];
        array_map(function (User $user) use (&$users){
            $users[] = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
            ];
        }, $userRepository->findAll());

        return $this->json(['users' => $users]);
    }

    #[Route('/user', name: 'app_user_store', methods: ['POST'])]
    public function store(UserRepository $userRepository, EntityManagerInterface $manager): JsonResponse
    {
        $userCount = count($userRepository->findAll());

        $user = new User();
        $user->setEmail(sprintf('test%d@test.test', $userCount));

        $manager->persist($user);
        $manager->flush();

        return $this->json(['message' => 'Success']);
    }
}
