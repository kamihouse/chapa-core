<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure;

interface FromJson
{
    public static function fromJson(string $json): self;
}
