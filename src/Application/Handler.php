<?php

declare(strict_types=1);

namespace Chapa\Core\Application;

use Chapa\Core\Shared\Result;

interface Handler
{
    public function handle(Action $action): Result;
}
