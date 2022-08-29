<?php

namespace App\Subscriber;

use App\Entity\Wine;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class WineSubscriber implements EventSubscriber
{
    public function __construct()
    {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $wine = $args->getObject();

        if (!$wine instanceof Wine) {
            return;
        }
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $wine = $args->getObject();

        if (!$wine instanceof Wine) {
            return;
        }
    }
}