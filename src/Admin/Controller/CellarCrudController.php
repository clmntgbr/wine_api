<?php

namespace App\Admin\Controller;

use App\Entity\Cellar;
use App\Form\BottleType;
use App\Form\ItemType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CellarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cellar::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Details'),
            IdField::new('id')->hideOnForm(),
            AssociationField::new('user')->setRequired(true),
            TextField::new('name'),
            BooleanField::new('isActive'),
            CollectionField::new('bottles')
                ->setEntryIsComplex()
                ->setDisabled(false)
                ->setEntryType(BottleType::class)
                ->hideOnIndex(),
            FormField::addPanel('Metadata'),
            DateTimeField::new('createdAt')->setDisabled(),
            DateTimeField::new('updatedAt')->setDisabled()->hideOnIndex(),
            Field::new('createdBy')->setDisabled(),
            Field::new('updatedBy')->setDisabled()->hideOnIndex(),
        ];
    }
}