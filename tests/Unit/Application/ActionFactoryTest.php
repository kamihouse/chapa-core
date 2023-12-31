<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Chapa\Core\Application\Action;
use Chapa\Core\Application\{ActionFactory, IActionFactory};
use Exception;
use Tests\TestCase;
use Tests\Unit\Application\Stubs\{ActionStub, ActionsEnumStub};

class ActionFactoryTest extends TestCase
{
    protected ActionFactory $sut;
    protected ActionsEnumStub $actions;

    public function setUp(): void
    {
        parent::setUp();
        $this->sut = $this->createSut();
    }

    public function testConstructorSuccessWithCorrectlyData()
    {
        $this->assertInstanceOf(IActionFactory::class, $this->sut);
    }

    public function testConstructorErrorWithIncorrectlyData()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('an enum instance is expected for the action record.');
        new ActionFactory(stdClass::class);
    }

    public function testCheckExistsAction()
    {
        $this->assertEquals(true, $this->sut->exists('stubed'));
        $this->assertEquals(false, $this->sut->exists('NOT stubed'));
    }

    public function testCreateActionSuccessWithExistsAction()
    {
        $action = $this->sut->create('stubed');
        $this->assertInstanceOf(ActionStub::class, $action);
        $this->assertInstanceOf(Action::class, $action);
    }

    public function testCreateActionErrorWithNotExistsAction()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('there is no NOT stubed action on the enum');
        $this->sut = $this->createSut();
        $this->sut->create('NOT stubed');
    }

    private function createSut()
    {
        return new ActionFactory(ActionsEnumStub::class);
    }
}
