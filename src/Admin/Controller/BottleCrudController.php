<?php

namespace App\Admin\Controller;

use App\Entity\Bottle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BottleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bottle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('formatName'),
            AssociationField::new('wine'),
            AssociationField::new('capacity'),
            AssociationField::new('cellar'),
            AssociationField::new('bottleStopper'),
            AssociationField::new('storageInstruction'),
        ];
    }
}
