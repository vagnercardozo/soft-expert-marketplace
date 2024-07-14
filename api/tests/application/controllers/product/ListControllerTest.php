<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\ListProductController;
use Src\Domain\Entities\Product\IListProduct;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Models\Product;

class TestListProductController extends ListProductController
{
    public function perform($request)
    {
        return parent::perform($request);
    }
}

class ListControllerTest extends TestCase
{
    private $products;
    private $listMock;
    private $controller;

    protected function setUp(): void
    {
        $this->products = [new Product(), new Product()];
        $this->listMock = $this->createMock(IListProduct::class);
        $this->controller = new TestListProductController($this->listMock);
    }

    public function testPerformListSuccess()
    {

        $this->listMock->expects($this->once())
            ->method('setupListProduct')
            ->with()
            ->willReturn($this->products);

        $response = $this->controller->perform('');
        $this->assertEquals(Response::json($this->products), $response);
    }

    public function testPerformListFailure()
    {

        $this->listMock->method('setupListProduct')
            ->will($this->throwException(new \Exception('Error listing product')));

        $response = $this->controller->perform('');

        $this->assertEquals(Response::json('Error listing product', 404), $response);
    }
}
