<?php

declare(strict_types=1);

namespace Chapa\Core\Domain\Validators;

abstract class Validator
{
    abstract public function validate(mixed $input): bool;

    abstract public function getErrorMessage();
}
