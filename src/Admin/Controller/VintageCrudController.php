<?php

namespace App\Admin\Controller;

use App\Entity\Vintage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VintageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vintage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->setDisabled(true),
            TextField::new('year')->setRequired(true),
        ];
    }
}
