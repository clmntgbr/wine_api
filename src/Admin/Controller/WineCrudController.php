<?php

namespace App\Admin\Controller;

use App\Entity\Wine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
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
            FormField::addPanel('Details'),
            IdField::new('id')->hideWhenCreating()->setDisabled(),
            TextField::new('name')->setRequired(true)->hideOnIndex(),
            TextField::new('formatName')->hideWhenCreating()->setDisabled(),
            AssociationField::new('status')->hideWhenCreating()->setRequired(true),
            AssociationField::new('appellation')->setRequired(true)->hideOnIndex(),
            AssociationField::new('domain')->setRequired(true)->hideOnIndex(),
            AssociationField::new('region')->setRequired(true)->hideOnIndex(),
            AssociationField::new('country')->setRequired(true)->hideOnIndex(),
            AssociationField::new('color')->setRequired(true)->hideOnIndex(),
            AssociationField::new('abv')->setRequired(true)->hideOnIndex(),
            AssociationField::new('wineDetail')->setRequired(true)->hideOnIndex(),
            AssociationField::new('vintage')->setRequired(true),
            AssociationField::new('grapeVarieties'),
            AssociationField::new('arrangements'),
            AssociationField::new('styles'),
            AssociationField::new('bios'),
            AssociationField::new('awards'),
            FormField::addPanel('Metadata'),
            DateTimeField::new('createdAt')->setDisabled(),
            DateTimeField::new('updatedAt')->setDisabled()->hideOnIndex(),
            Field::new('createdBy')->setDisabled(),
            Field::new('updatedBy')->setDisabled()->hideOnIndex(),
        ];
    }
}