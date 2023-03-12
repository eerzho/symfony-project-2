<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_todolist_index', methods: ['GET'])]
    public function index(TaskRepository $repository): Response
    {
        $tasks = $repository->findBy([], ['id' => 'DESC']);

        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
            'tasks' => $tasks,
        ]);
    }

    #[Route('/task', name: 'app_todolist_store', methods: ['POST'])]
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

    #[Route('/task/{id}/update', name: 'app_todolist_update', methods: ['GET'])]
    public function update(Task $task, EntityManagerInterface $manager): RedirectResponse
    {
        $task->setStatus(!$task->isStatus());
        $manager->persist($task);
        $manager->flush();

        return $this->redirectToRoute('app_todolist_index');
    }

    #[Route('/task/{id}/remove', name: 'app_todolist_destroy', methods: ['GET'])]
    public function destroy(Task $task, EntityManagerInterface $manager): RedirectResponse
    {
        $manager->remove($task);
        $manager->flush();

        return $this->redirectToRoute('app_todolist_index');
    }
}
