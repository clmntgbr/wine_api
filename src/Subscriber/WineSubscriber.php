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

        $wine->setFormatName($this->format($wine));
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $wine = $args->getObject();

        if (!$wine instanceof Wine) {
            return;
        }

        $wine->setFormatName($this->format($wine));
    }

    private function format(Wine $wine): string
    {
        return sprintf('%s, %s, %s, %s, %s, %s',
            $wine->getName(),
            $wine->getAppellation()->getName(),
            $wine->getDomain()->getName(),
            $wine->getRegion()->getName(),
            $wine->getCountry()->getName(),
            $wine->getColor()->getName(),
        );
    }
}