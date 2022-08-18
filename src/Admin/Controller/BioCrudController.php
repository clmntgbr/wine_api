<?php

namespace App\Admin\Controller;

use App\Entity\Bio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->setDisabled(true),
            TextField::new('name')->setRequired(true),
            AssociationField::new('status')->hideWhenCreating()->setRequired(true),
        ];
    }
}
