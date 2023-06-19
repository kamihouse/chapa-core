<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Inject
{
    public function __construct(public string $className) {}
}
