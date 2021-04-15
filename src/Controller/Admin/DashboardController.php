<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        #return parent::index();

        return $this->render('admin/admin.html.twig');

        #$routeBuilder = $this->get(AdminUrlGenerator::class);
        #return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin')
            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('build/images/favicon.png')
            ->setTranslationDomain('Admin');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),

            MenuItem::section('Portfolio'),
            MenuItem::linkToCrud('Catégories', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Articles', 'fa fa-file-text', Post::class),

            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),
        ];
    }
}
