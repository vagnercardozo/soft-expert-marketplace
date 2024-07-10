<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\InsertProductController;
use Src\Domain\Entities\Product\IInsertProduct;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Models\Product;

// Subclasse de teste para expor o método protected perform
class TestInsertProductController extends InsertProductController
{
    public function perform($request)
    {
        return parent::perform($request);
    }
}

class InsertControllerTest extends TestCase
{
    private $insertMock;
    private $controller;

    protected function setUp(): void
    {
        $this->insertMock = $this->createMock(IInsertProduct::class);
        $this->controller = new TestInsertProductController($this->insertMock);
    }

    public function testPerformInsertSuccess()
    {
        $params = ['description' => 'any_description'];
        $product = new Product();
        $product->description = 'any_description';

        $this->insertMock->expects($this->once())
            ->method('setupInsertProduct')
            ->with($params)
            ->willReturn($product);

        $response = $this->controller->perform($params);
        $this->assertEquals(Response::json($product), $response);
    }

    public function testPerformInsertFailure()
    {
        $params = ['description' => 'any_description'];

        $this->insertMock->method('setupInsertProduct')
            ->will($this->throwException(new \Exception('Error inserting product')));

        $response = $this->controller->perform($params);
        $this->assertEquals(Response::json('Error inserting product', 404), $response);
    }
}
