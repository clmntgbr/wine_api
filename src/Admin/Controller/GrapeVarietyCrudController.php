<?php

namespace App\Admin\Controller;

use App\Entity\GrapeVariety;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GrapeVarietyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GrapeVariety::class;
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
