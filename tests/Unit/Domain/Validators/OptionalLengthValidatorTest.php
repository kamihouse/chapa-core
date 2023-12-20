<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Validators;

use Frete\Core\Domain\Validators\OptionalLengthValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalLengthValidatorTest extends TestCase
{
    public function testShouldValidateLength()
    {
        $validator = new OptionalLengthValidator(5, 10);
        $this->assertTrue($validator->validate('1234567890'));
    }

    public function testShouldValidateLengthIsNull()
    {
        $validator = new OptionalLengthValidator(5, 10);
        $this->assertTrue($validator->validate(null));
    }

    public function testShouldNotValidateLengthGreaterThanMax()
    {
        $validator = new OptionalLengthValidator(5, 10);
        $this->assertFalse($validator->validate('12345678901'));
        $this->assertEquals('Invalid length', $validator->getErrorMessage());
    }

    public function testShouldNotValidateLengthLessThanMin()
    {
        $validator = new OptionalLengthValidator(5, 10);
        $this->assertFalse($validator->validate('1234'));
        $this->assertEquals('Invalid length', $validator->getErrorMessage());
    }
}
