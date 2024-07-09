<?php

namespace Tests\Domain\Product;

use PHPUnit\Framework\TestCase;
use Src\Domain\Usecases\Product\DeleteProduct;
use Src\Domain\Contract\Repositories\Product\IDeleteProduct as IDelete;

class DeleteTest extends TestCase
{
    private $repoMock;
    private $deleteProduct;

    protected function setUp(): void
    {
        // Cria um mock para o repositório
        $this->repoMock = $this->createMock(IDelete::class);

        // Instancia a classe DeleteProduct com o mock do repositório
        $this->deleteProduct = new DeleteProduct($this->repoMock);
    }

    public function testSetupDeleteProduct()
    {
        $params = 1;

        // Configura o mock para esperar que o método delete seja chamado com os parâmetros fornecidos
        $this->repoMock->expects($this->once())
            ->method('delete')
            ->with($params);

        // Chama o método que estamos testando
        $this->deleteProduct->setupDeleteProduct($params);
    }
}
