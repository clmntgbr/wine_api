<?php

namespace App\Subscriber;

use App\Entity\Bottle;
use App\Service\Uuid;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class BottleSubscriber implements EventSubscriber
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
        $bottle = $args->getObject();

        if (!$bottle instanceof Bottle) {
            return;
        }

        if (null === $bottle->getFamilyCode()) {
            $bottle->setFamilyCode(Uuid::v4());
        }
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $bottle = $args->getObject();

        if (!$bottle instanceof Bottle) {
            return;
        }
    }
}