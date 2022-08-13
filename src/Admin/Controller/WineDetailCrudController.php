<?php

namespace App\Admin\Controller;

use App\Entity\WineDetail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WineDetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WineDetail::class;
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
