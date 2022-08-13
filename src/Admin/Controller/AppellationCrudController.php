<?php

namespace App\Admin\Controller;

use App\Entity\Appellation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AppellationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Appellation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->setDisabled(true),
            TextField::new('name'),
        ];
    }
}
