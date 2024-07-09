<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\ListProductController;
use Src\Domain\Entities\Product\IListProduct;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Models\Product;

// Subclasse de teste para expor o método protected perform
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

        // Configura o mock para lançar uma exceção quando o método setupListProduct for chamado
        $this->listMock->method('setupListProduct')
            ->will($this->throwException(new \Exception('Error listing product')));

        // Chama o método perform da subclasse de teste
        $response = $this->controller->perform('');

        // Verifica se a resposta de erro está correta
        $this->assertEquals(Response::json('Error listing product', 404), $response);
    }
}
