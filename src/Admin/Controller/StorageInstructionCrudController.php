<?php

namespace App\Admin\Controller;

use App\Entity\StorageInstruction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StorageInstructionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StorageInstruction::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
