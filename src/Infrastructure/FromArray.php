<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure;

interface FromArray
{
    public static function fromArray(array $data): self;
}
