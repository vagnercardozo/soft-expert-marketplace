<?php

namespace Tests\Domain\Product;

use PHPUnit\Framework\TestCase;
use Src\Domain\Usecases\Product\UpdateProduct;
use Src\Domain\Contract\Repositories\Product\IUpdateProduct as IUpdate;
use Src\Infra\Repositories\Postgres\Models\Product;
use Error;

class UpdateTest extends TestCase
{
    private $repoMock;
    private $updateProduct;

    protected function setUp(): void
    {
        $this->repoMock = $this->createMock(IUpdate::class);
        $this->updateProduct = new UpdateProduct($this->repoMock);
    }

    public function testSetupUpdateProductSuccess()
    {
        $params = ['id' => 1, 'description' => 'Test Product', 'value' => 100];
        $product = $this->createMock(Product::class);
        $this->repoMock->method('update')
            ->with($params)
            ->willReturn($product);
        $result = $this->updateProduct->setupUpdateProduct($params);


        $this->assertSame($product, $result);
    }

    public function testSetupUpdateProductFailure()
    {
        $params = ['id' => 1, 'description' => 'Test Product', 'value' => 100];
        $this->repoMock->method('update')
            ->with($params)
            ->willReturn(null);

        $this->expectException(Error::class);
        $this->expectExceptionMessage('Error Update Product');
        $this->updateProduct->setupUpdateProduct($params);
    }
}
