<?php

namespace App\Admin\Controller;

use App\Entity\Abv;
use App\Entity\Appellation;
use App\Entity\Arrangement;
use App\Entity\Award;
use App\Entity\Bio;
use App\Entity\Bottle;
use App\Entity\BottleStopper;
use App\Entity\Capacity;
use App\Entity\Cellar;
use App\Entity\Color;
use App\Entity\Country;
use App\Entity\Domain;
use App\Entity\GrapeVariety;
use App\Entity\Region;
use App\Entity\StorageInstruction;
use App\Entity\User;
use App\Entity\Vintage;
use App\Entity\Wine;
use App\Entity\WineDetail;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('@EasyAdmin/page/content.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getEmail());
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToUrl('Api Docs', 'fas fa-map-marker-alt', '/api/docs');
        yield MenuItem::linkToCrud('Cellar', 'fas fa-list', Cellar::class);
        yield MenuItem::linkToCrud('Bottle', 'fas fa-list', Bottle::class);
        yield MenuItem::linkToCrud('BottleStopper', 'fas fa-list', BottleStopper::class);
        yield MenuItem::linkToCrud('StorageInstruction', 'fas fa-list', StorageInstruction::class);
        yield MenuItem::linkToCrud('Vintage', 'fas fa-list', Vintage::class);
        yield MenuItem::linkToCrud('Capacity', 'fas fa-list', Capacity::class);
        yield MenuItem::linkToCrud('Wine', 'fas fa-list', Wine::class);
        yield MenuItem::linkToCrud('WineDetail', 'fas fa-list', WineDetail::class);
        yield MenuItem::linkToCrud('Abv', 'fas fa-list', Abv::class);
        yield MenuItem::linkToCrud('Award', 'fas fa-list', Award::class);
        yield MenuItem::linkToCrud('Bio', 'fas fa-list', Bio::class);
        yield MenuItem::linkToCrud('GrapeVariety', 'fas fa-list', GrapeVariety::class);
        yield MenuItem::linkToCrud('Arrangement', 'fas fa-list', Arrangement::class);
        yield MenuItem::linkToCrud('Color', 'fas fa-list', Color::class);
        yield MenuItem::linkToCrud('Appellation', 'fas fa-list', Appellation::class);
        yield MenuItem::linkToCrud('Domain', 'fas fa-list', Domain::class);
        yield MenuItem::linkToCrud('Region', 'fas fa-list', Region::class);
        yield MenuItem::linkToCrud('Country', 'fas fa-list', Country::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
    }
}
