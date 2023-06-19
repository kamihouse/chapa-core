<?php

declare(strict_types=1);

namespace Chapa\Core\Domain;

abstract class Entity
{
    protected function __construct(public readonly string $id) {}
}
