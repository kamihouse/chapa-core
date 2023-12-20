<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Validators;

use Frete\Core\Domain\Validators\CpfValidator;
use Tests\TestCase;

/**
 * @internal
 */
class CpfValidatorTest extends TestCase
{
    public function testShouldValidateIndividualPerson()
    {
        $validator = new CpfValidator();
        $this->assertTrue($validator->validate('75625164304'));
    }

    public function testShouldValidateIsNull()
    {
        $validator = new CpfValidator();
        $this->assertFalse($validator->validate(null));
        $this->assertEquals('Invalid cpf', $validator->getErrorMessage());
    }

    public function testShouldNotValidateIndividualPerson()
    {
        $validator = new CpfValidator();
        $this->assertFalse($validator->validate('12345678901'));
        $this->assertEquals('Invalid cpf', $validator->getErrorMessage());
    }

}
