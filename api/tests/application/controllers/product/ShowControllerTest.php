<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\ShowProductController;
use Src\Domain\Entities\Product\IShowProduct;
use Src\Application\Helpers\Response;
use Src\Infra\Repositories\Postgres\Models\Product;

// Subclasse de teste para expor o método protected perform
class TestShowProductController extends ShowProductController
{
    public function perform($request)
    {
        return parent::perform($request);
    }
}

class ShowControllerTest extends TestCase
{
    private $showMock;
    private $controller;

    protected function setUp(): void
    {
        $this->showMock = $this->createMock(IShowProduct::class);
        $this->controller = new TestShowProductController($this->showMock);
    }

    public function testPerformShowSuccess()
    {
        $params = ['description' => 'any_description'];
        $product = new Product();
        $product->description = 'any_description';

        $this->showMock->expects($this->once())
            ->method('setupShowProduct')
            ->with($params)
            ->willReturn($product);

        $response = $this->controller->perform($params);
        $this->assertEquals(Response::json($product), $response);
    }

    public function testPerformShowFailure()
    {
        $params = ['description' => 'any_description'];

        // Configura o mock para lançar uma exceção quando o método setupShowProduct for chamado
        $this->showMock->method('setupShowProduct')
            ->will($this->throwException(new \Exception('Error showing product')));

        // Chama o método perform da subclasse de teste
        $response = $this->controller->perform($params);

        // Verifica se a resposta de erro está correta
        $this->assertEquals(Response::json('Error showing product', 404), $response);
    }
}
