<?php

namespace App\Admin\Controller;

use App\Entity\Abv;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AbvCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Abv::class;
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
