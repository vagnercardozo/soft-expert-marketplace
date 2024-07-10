<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\UpdateProductController;
use Src\Domain\Entities\Product\IUpdateProduct;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Models\Product;

// Subclasse de teste para expor o método protected perform
class TestUpdateProductController extends UpdateProductController
{
    public function perform($request)
    {
        return parent::perform($request);
    }
}

class UpdateControllerTest extends TestCase
{
    private $updateMock;
    private $controller;

    protected function setUp(): void
    {
        $this->updateMock = $this->createMock(IUpdateProduct::class);
        $this->controller = new TestUpdateProductController($this->updateMock);
    }

    public function testPerformUpdateSuccess()
    {
        $params = ['description' => 'any_description'];
        $product = new Product();
        $product->description = 'any_description';

        $this->updateMock->expects($this->once())
            ->method('setupUpdateProduct')
            ->with($params)
            ->willReturn($product);

        $response = $this->controller->perform($params);
        $this->assertEquals(Response::json($product), $response);
    }

    public function testPerformUpdateFailure()
    {
        $params = ['description' => 'any_description'];

        $this->updateMock->method('setupUpdateProduct')
            ->will($this->throwException(new \Exception('Error updateing product')));

        $response = $this->controller->perform($params);

        $this->assertEquals(Response::json('Error updateing product', 404), $response);
    }
}
