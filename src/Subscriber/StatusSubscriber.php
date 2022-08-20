<?php

namespace App\Subscriber;

use App\Entity\Bottle;
use App\Lists\StatusReference;
use App\Repository\StatusRepository;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping\Entity;

class StatusSubscriber implements EventSubscriber
{
    public function __construct(
        private StatusRepository $statusRepository
    ) {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!in_array(get_class($entity), [
            'App\Entity\Abv',
            'App\Entity\Appellation',
            'App\Entity\Arrangement',
            'App\Entity\Award',
            'App\Entity\Bio',
            'App\Entity\BottleStopper',
            'App\Entity\Domain',
            'App\Entity\Country',
            'App\Entity\GrapeVariety',
            'App\Entity\Region',
            'App\Entity\StorageInstruction',
            'App\Entity\Style',
            'App\Entity\Wine',
            'App\Entity\WineDetail',
        ])) {
            return;
        }

        if ($entity->getStatus() !== null) {
            return;
        }

        $status = $this->statusRepository->findOneBy(['reference' => StatusReference::WAITING_VALIDATION]);
        $entity->setStatus($status);
    }
}
