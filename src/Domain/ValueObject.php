<?php

declare(strict_types=1);

namespace Chapa\Core\Domain;

interface ValueObject
{
    public function equals(ValueObject $valueObject): bool;
}
