<?php

namespace Tests\Application\Controllers\Product;

use PHPUnit\Framework\TestCase;
use Src\Application\Controllers\Product\DeleteProductController;
use Src\Domain\Entities\Product\IDeleteProduct;
use Src\Application\Helpers\Response;

// Subclasse de teste para expor o método protected perform
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
        // Cria um mock para a interface IDeleteProduct
        $this->deleteMock = $this->createMock(IDeleteProduct::class);

        // Instancia a subclasse de teste do controlador com o mock da interface IDeleteProduct
        $this->controller = new TestableDeleteProductController($this->deleteMock);
    }

    public function testPerformDeleteSuccess()
    {
        $id = 1;

        // Configura o mock para esperar que o método setupDeleteProduct seja chamado com o id fornecido
        $this->deleteMock->expects($this->once())
            ->method('setupDeleteProduct')
            ->with($id);

        // Chama o método perform da subclasse de teste
        $response = $this->controller->perform($id);

        // Verifica se a resposta está correta
        $this->assertEquals(Response::json('Delete'), $response);
    }

    public function testPerformDeleteFailure()
    {
        $id = 1;

        // Configura o mock para lançar uma exceção quando o método setupDeleteProduct for chamado
        $this->deleteMock->method('setupDeleteProduct')
            ->will($this->throwException(new \Exception('Error deleting product')));

        // Chama o método perform da subclasse de teste
        $response = $this->controller->perform($id);

        // Verifica se a resposta de erro está correta
        $this->assertEquals(Response::json('Error deleting product', 404), $response);
    }
}
