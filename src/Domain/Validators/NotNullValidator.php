<?php

declare(strict_types=1);

namespace Chapa\Core\Domain\Validators;

class NotNullValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        $this->isValid = null !== $input;
        return $this->isValid;
    }

    /**
     * @return null|string
     */
    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Cannot be null' : null;
    }
}
