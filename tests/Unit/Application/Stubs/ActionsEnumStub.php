<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Stubs;

use Chapa\Core\Application\Command;

class ActionStub implements Command {}

enum ActionsEnumStub: string
{
    case stubed = ActionStub::class;
}
