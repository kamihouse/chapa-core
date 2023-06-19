<?php

declare(strict_types=1);

namespace Chapa\Core\Domain;

interface IdGenerator
{
    public static function generate(): string|int;
}
