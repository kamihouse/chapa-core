<?php

declare(strict_types=1);

namespace Tests\Integration\Infrastructure\Ecotone\Commands;

use Chapa\Core\Application\Command;
use Ecotone\Modelling\Attribute\CommandHandler;

class ChangeEmailAddressHandler implements Command
{
    #[CommandHandler]
    public function handle(ChangeEmailAddressCommand $command): void
    {
        // retrieve user and change the email
    }
}
