<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\DeleteProductController;
use Src\Domain\Entities\Product\IDeleteProduct;
use Src\Application\Helpers\Response;

class TestableDeleteProductController extends DeleteProductController
{
    public function perform($request)
    {
        return parent::perform($request);
    }
}

class DeleteControllerTest extends TestCase
{
    private $deleteMock;
    private $controller;

    protected function setUp(): void
    {
        $this->deleteMock = $this->createMock(IDeleteProduct::class);
        $this->controller = new TestableDeleteProductController($this->deleteMock);
    }

    public function testPerformDeleteSuccess()
    {
        $id = 1;
        $this->deleteMock->expects($this->once())
            ->method('setupDeleteProduct')
            ->with($id);

        $response = $this->controller->perform($id);
        $this->assertEquals(Response::json('Delete'), $response);
    }

    public function testPerformDeleteFailure()
    {
        $id = 1;
        $this->deleteMock->method('setupDeleteProduct')
            ->will($this->throwException(new \Exception('Error deleting product')));

        $response = $this->controller->perform($id);
        $this->assertEquals(Response::json('Error deleting product', 404), $response);
    }
}
