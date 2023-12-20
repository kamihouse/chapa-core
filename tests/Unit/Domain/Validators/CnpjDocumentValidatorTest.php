<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Validators;

use Frete\Core\Domain\Validators\PersonDocumentValidator;
use Tests\TestCase;

/**
 * @internal
 */
class CnpjDocumentValidatorTest extends TestCase
{
    public function testShouldValidateLegalPerson()
    {
        $validator = new PersonDocumentValidator();
        $this->assertTrue($validator->validate('54392054000179'));
    }

    public function testShouldValidateIsNull()
    {
        $validator = new PersonDocumentValidator();
        $this->assertFalse($validator->validate(null));
        $this->assertEquals('Invalid document', $validator->getErrorMessage());
    }

    public function testShouldNotValidateLegalPerson()
    {
        $validator = new PersonDocumentValidator();
        $this->assertFalse($validator->validate('54392054000000'));
        $this->assertEquals('Invalid document', $validator->getErrorMessage());
    }
}
