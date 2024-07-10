<?php

namespace Src\Domain\Usecases\Sale;

use Error;
use Src\Domain\Contract\Repositories\ProductSale\IRepositoryProductSale;
use Src\Domain\Contract\Repositories\Sale\IRepositorySale as IUpdate;
use Src\Domain\Entities\Sale\IUpdateSale;
use Src\Infra\Repositories\Postgres\Models\Sale;
use Throwable;

class UpdateSale implements IUpdateSale
{
    public function __construct(private IUpdate $repo, private IRepositoryProductSale $repoDetails)
    {
    }

    public function setupUpdateSale($params): Sale
    {
        try {
            $sale = $this->repo->update($params);

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
            return throw new Error('Error Update Sale');
        }
    }
}
