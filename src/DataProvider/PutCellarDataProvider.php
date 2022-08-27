<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Cellar;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

final class PutCellarDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(
        private Security $security,
        private EntityManagerInterface $em
    ){   
    }
    
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Cellar::class === $resourceClass && 'put' === $operationName;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Cellar
    {
        $user = $this->security->getUser();

        if (!$user instanceof User) {
            return null;
        }

        $tmp = null;
        
        foreach ($user->getCellars() as $cellar) {
            if ($cellar->getId() !== $id) {
                $this->em->persist($cellar->setIsActive(false));
                $this->em->flush();
                continue;
            }
            $tmp = $cellar;
        }

        return $tmp;
    }
}