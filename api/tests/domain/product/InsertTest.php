<?php

namespace Tests\Domain\Product;

use PHPUnit\Framework\TestCase;
use Src\Domain\Usecases\Product\InsertProduct;
use Src\Domain\Contract\Repositories\Product\IInsertProduct as IInsert;
use Src\Infra\Repositories\Postgres\Models\Product;
use Error;

class InsertTest extends TestCase
{
    private $repoMock;
    private $insertProduct;

    protected function setUp(): void
    {
        $this->repoMock = $this->createMock(IInsert::class);
        $this->insertProduct = new InsertProduct($this->repoMock);
    }

    public function testSetupInsertProductSuccess()
    {
        $params = ['description' => 'Test Product', 'value' => 100];
        $product = $this->createMock(Product::class);
        $this->repoMock->method('insert')
            ->with($params)
            ->willReturn($product);
        $result = $this->insertProduct->setupInsertProduct($params);


        $this->assertSame($product, $result);
    }

    public function testSetupInsertProductFailure()
    {
        $params = ['description' => 'Test Product', 'value' => 100];
        $this->repoMock->method('insert')
            ->with($params)
            ->willReturn(null);

        $this->expectException(Error::class);
        $this->expectExceptionMessage('Error Insert Product');
        $this->insertProduct->setupInsertProduct($params);
    }
}
