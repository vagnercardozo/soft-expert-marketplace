<?php

namespace Tests\Domain\Product;

use PHPUnit\Framework\TestCase;
use Src\Domain\Usecases\Product\ShowProduct;
use Src\Domain\Contract\Repositories\Product\IShowProduct as IShow;
use Src\Infra\Repositories\Postgres\Models\Product;
use Error;

class ShowTest extends TestCase
{
    private $repoMock;
    private $showProduct;

    protected function setUp(): void
    {
        $this->repoMock = $this->createMock(IShow::class);
        $this->showProduct = new ShowProduct($this->repoMock);
    }

    public function testSetupShowProductSuccess()
    {
        $params = 1;
        $product = $this->createMock(Product::class);
        $this->repoMock->method('show')
            ->with($params)
            ->willReturn($product);
        $result = $this->showProduct->setupShowProduct($params);


        $this->assertSame($product, $result);
    }

    public function testSetupShowProductFailure()
    {
        $params = 1;
        $this->repoMock->method('show')
            ->with($params)
            ->willReturn(null);

        $this->expectException(Error::class);
        $this->expectExceptionMessage('Error Show Product');
        $this->showProduct->setupShowProduct($params);
    }
}
