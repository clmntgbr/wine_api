<?php

namespace App\Admin\Controller;

use App\Entity\BottleStopper;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BottleStopperCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BottleStopper::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
