<?php

declare(strict_types=1);

namespace Chapa\Core\Application;

use BackedEnum;

interface IActionFactory
{
    public function register(string $actionsEnumPath): void;

    public function exists(string $action): bool;

    public function create(string|BackedEnum $action, ?array $actionProps = null): Action;
}
