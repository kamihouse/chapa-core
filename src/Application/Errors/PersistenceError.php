<?php

declare(strict_types=1);

namespace Chapa\Core\Application\Errors;

class PersistenceError extends ApplicationError
{
    public function __construct(
        private readonly mixed $error
    ) {}

    public function getError()
    {
        return $this->error;
    }
}
