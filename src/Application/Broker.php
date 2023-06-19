<?php

declare(strict_types=1);

namespace Chapa\Core\Application;

use Chapa\Core\Domain\DomainEvent;

interface Broker
{
    public function publish(DomainEvent $event): void;

    public function subscribe(string $eventClass, Handler $handler): void;
}
