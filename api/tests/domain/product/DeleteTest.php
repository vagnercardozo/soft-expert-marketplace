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
        $this->repoMock = $this->createMock(IDelete::class);
        $this->deleteProduct = new DeleteProduct($this->repoMock);
    }

    public function testSetupDeleteProduct()
    {
        $params = 1;

        $this->repoMock->expects($this->once())
            ->method('delete')
            ->with($params);

        $this->deleteProduct->setupDeleteProduct($params);
    }
}
