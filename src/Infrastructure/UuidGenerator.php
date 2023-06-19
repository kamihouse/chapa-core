<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure;

use Chapa\Core\Domain\IdGenerator;
use Ramsey\Uuid\Uuid;

class UuidGenerator implements IdGenerator
{
    public static function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
