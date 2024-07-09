<?php

namespace Src\Domain\Usecases\Sale;

use Error;
use Src\Domain\Contract\Repositories\Sale\IRepositorySale;
use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Domain\Entities\Sale\IInsertSale;
use Src\Infra\Repositories\Postgres\Models\Sale;

class InsertSale implements IInsertSale
{
    public function __construct(private IRepositorySale $repo, private IRepositoryProductSale $repoDetails)
    {
    }

    public function setupInsertSale($products): Sale
    {
        $value = 0;
        foreach ($products as &$productValue) {
            $value += $productValue['value'] * $productValue['quantity'];
        }
        $sale = $this->repo->insert(['value' => $value]);

        $productsSale = [];

        foreach ($products as $product) {
            $productsSale[] = [
                'product_id' => $product['id'],
                'sale_id' => $sale->id,
                'value' => $product['value'],
                'quantity' => $product['quantity'],
                'tax' => 0.0
            ];
        }
        $this->repoDetails->insert($productsSale);
        $sale = $this->repo->show($sale->id);
        return $sale;
    }
}
