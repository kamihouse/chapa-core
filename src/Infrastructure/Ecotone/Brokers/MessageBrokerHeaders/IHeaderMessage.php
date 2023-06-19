<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure\Ecotone\Brokers\MessageBrokerHeaders;

interface IHeaderMessage
{
    public function getSchema(): array;
}
