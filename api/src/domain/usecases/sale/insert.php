<?php

namespace Src\Domain\Usecases\Sale;

use Error;
use Src\Domain\Contract\Repositories\Sale\IRepositorySale;
use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Domain\Entities\Sale\IInsertSale;
use Src\Infra\Repositories\Postgres\Models\Sale;
use Throwable;

class InsertSale implements IInsertSale
{
    public function __construct(private IRepositorySale $repo, private IRepositoryProductSale $repoDetails)
    {
    }

    public function setupInsertSale($params): Sale
    {
        try {
            $sale = $this->repo->insert($params);

            $products = $params['products'];
            $productsSale = [];

            if (!empty($products)) {
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
            }
            $sale = $this->repo->show($sale->id);
            return $sale;
        } catch (Throwable $error) {
            if (isset($sale->id)) {
                $this->repo->delete($sale->id);
            }
            return throw new Error('Error Insert Sale');
        }
    }
}
