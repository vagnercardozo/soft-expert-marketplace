<?php

namespace Tests\Domain\Product;

use PHPUnit\Framework\TestCase;
use Src\Domain\Usecases\Product\ListProduct;
use Src\Domain\Contract\Repositories\Product\IListProduct as IList;
use Src\Infra\Repositories\Postgres\Models\Product;

class ListTest extends TestCase
{
    private $repoMock;
    private $listProduct;

    protected function setUp(): void
    {
        $this->repoMock = $this->createMock(IList::class);
        $this->listProduct = new ListProduct($this->repoMock);
    }

    public function testSetupListProductSuccess()
    {
        $productArray = [new Product(), new Product()];
        $this->repoMock->method('list')
            ->with()
            ->willReturn($productArray);
        $result = $this->listProduct->setupListProduct();

        $this->assertSame($productArray, $result);
    }
}
