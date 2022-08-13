<?php

namespace App\Admin\Controller;

use App\Entity\Bio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bio::class;
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
