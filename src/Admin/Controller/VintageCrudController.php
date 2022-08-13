<?php

namespace App\Admin\Controller;

use App\Entity\Vintage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VintageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vintage::class;
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
