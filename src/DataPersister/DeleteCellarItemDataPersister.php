<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Cellar;
use App\Entity\User;
use App\Entity\UserGasStation;
use App\Repository\CellarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Security\Core\Security;

class DeleteCellarItemDataPersister implements ContextAwareDataPersisterInterface
{
    public function __construct(
        private Security               $security,
        private EntityManagerInterface $em,
        private CellarRepository $cellarRepository
    )
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Cellar && array_key_exists('item_operation_name', $context) && $context['item_operation_name'] === 'delete';
    }

    public function persist($data, array $context = []): Cellar
    {
        return $data;
    }

    /**
     * @param Cellar $data
     */
    public function remove($data, array $context = [])
    {
        /** @var User $user */
        $user = $this->security->getUser();

        if (null === $user) {
            return null;
        }

        if ($data->getIsActive()) {
            $cellar = $this->cellarRepository->getCellarExceptId($data->getId(), $user);
            if ($cellar instanceof Cellar) {
                $cellar->setIsActive(true);
                $this->em->persist($data);
            }
        }

        $this->em->remove($data);
        $this->em->flush();

        return $data;
    }
}