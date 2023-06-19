<?php

declare(strict_types=1);

namespace Chapa\Core\Application;

interface IMessageDispatcher
{
    public function dispatch($message): void;
}
