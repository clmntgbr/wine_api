<?php

namespace App\Admin\Controller;

use App\Entity\Wine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wine::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->setDisabled(true),
            TextField::new('name'),
            TextField::new('formatName')->hideWhenCreating()->setDisabled(true),
            AssociationField::new('appellation'),
            AssociationField::new('domain'),
            AssociationField::new('region'),
            AssociationField::new('country'),
            AssociationField::new('color'),
            AssociationField::new('abv'),
            AssociationField::new('wineDetail'),
            AssociationField::new('vintage'),
            AssociationField::new('grapeVarieties'),
            AssociationField::new('arrangements'),
            AssociationField::new('styles'),
            AssociationField::new('bios'),
            AssociationField::new('awards'),
        ];
    }
}
