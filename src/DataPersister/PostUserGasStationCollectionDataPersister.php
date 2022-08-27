<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Cellar;
use App\Entity\User;
use App\Entity\UserGasStation;
use App\Repository\UserGasStationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Security\Core\Security;

class PostCellarCollectionDataPersister implements ContextAwareDataPersisterInterface
{
    public function __construct(
        private Security                 $security,
        private EntityManagerInterface   $em
    )
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Cellar && array_key_exists('collection_operation_name', $context) && $context['collection_operation_name'] === 'post';
    }

    /**
     * @param Cellar $data
     */
    public function persist($data, array $context = []): ?Cellar
    {
        /** @var User $user */
        $user = $this->security->getUser();

        if (null === $user) {
            return null;
        }

        $data->setUser($user);

        $this->em->persist($data);
        $this->em->flush();
        
        return $data;
    }

    public function remove($data, array $context = [])
    {
        return $data;
    }
}