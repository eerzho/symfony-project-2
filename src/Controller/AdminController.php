<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/categories', name: 'app_admin_categories')]
    public function categories(): Response
    {
        return $this->render('admin/categories.html.twig');
    }

    #[Route('/edit-category', name: 'app_admin_editcategory')]
    public function editCategory(): Response
    {
        return $this->render('admin/edit_category.html.twig');
    }

    #[Route('/videos', name: 'app_admin_videos')]
    public function videos(): Response
    {
        return $this->render('admin/videos.html.twig');
    }

    #[Route('/upload-video', name: 'app_admin_uploadvideo')]
    public function uploadVideo(): Response
    {
        return $this->render('admin/upload_video.html.twig');
    }

    #[Route('/users', name: 'app_admin_users')]
    public function users(): Response
    {
        return $this->render('admin/users.html.twig');
    }
}
