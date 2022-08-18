<?php

namespace App\Admin\Controller;

use App\Entity\Capacity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CapacityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Capacity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->setDisabled(true),
            TextField::new('name')->setRequired(true),
            NumberField::new('value')->setRequired(true),
        ];
    }
}
