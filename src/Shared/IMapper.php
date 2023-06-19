<?php

declare(strict_types=1);

namespace Chapa\Core\Shared;

interface IMapper
{
    public function toDomain($rawData): mixed;

    public function toDto($data, ?string $convertTo): mixed;

    public function toPersistence($domainData): ?array;
}
