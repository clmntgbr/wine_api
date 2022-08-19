<?php

namespace App\Admin\Controller;

use App\Entity\Bottle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
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
            FormField::addPanel('Details'),
            IdField::new('id')->hideOnForm(),
            TextField::new('formatName')->hideWhenCreating()->setDisabled(),
            AssociationField::new('wine')->setRequired(true),
            AssociationField::new('capacity')->setRequired(true),
            AssociationField::new('cellar')->setRequired(true),
            AssociationField::new('bottleStopper')->setRequired(true),
            AssociationField::new('storageInstruction')->setRequired(true),
            FormField::addPanel('Metadata'),
            DateTimeField::new('createdAt')->setDisabled(),
            DateTimeField::new('updatedAt')->setDisabled()->hideOnIndex(),
            Field::new('createdBy')->setDisabled(),
            Field::new('updatedBy')->setDisabled()->hideOnIndex(),
        ];
    }
}
