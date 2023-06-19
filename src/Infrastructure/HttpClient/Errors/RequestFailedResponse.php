<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure\HttpClient\Errors;

class RequestFailedResponse
{
    public function __construct(
        private readonly mixed $error
    ) {}

    public function getError()
    {
        return $this->error;
    }
}
