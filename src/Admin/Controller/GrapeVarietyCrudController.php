<?php

namespace App\Admin\Controller;

use App\Entity\GrapeVariety;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GrapeVarietyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GrapeVariety::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()->setDisabled(true),
            TextField::new('name')->setRequired(true),
        ];
    }
}
