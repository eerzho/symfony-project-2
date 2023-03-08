<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    #[Route('/to/do/list', name: 'app_todolist_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('to_do_list/index.html.twig', [
            'controller_name' => 'ToDoListController',
        ]);
    }

    #[Route('/to/do/list', name: 'app_todolist_store', methods: ['POST'])]
    public function store(Request $request, EntityManagerInterface $manager): RedirectResponse
    {
        $title = $request->get('title');

        if (!$title) {
            return $this->redirectToRoute('app_todolist_index');
        }

        $task = (new Task())
            ->setTitle($title)
            ->setStatus(false);

        $manager->persist($task);
        $manager->flush();

        return $this->redirectToRoute('app_todolist_index');
    }

    #[Route('/to/do/list/{id}', name: 'app_todolist_update', methods: ['POST'])]
    public function update($id)
    {
        dd($id);
    }

    #[Route('/to/do/list/{id}', name: 'app_todolist_destroy', methods: ['GET'])]
    public function destroy($id)
    {
        dd($id);
    }
}
