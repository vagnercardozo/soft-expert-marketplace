<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as IInsert;
use Src\Domain\Entities\ProductCategory\IInsertProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;
use Throwable;

class InsertProductCategory implements IInsertProductCategory
{
    public function __construct(private IInsert $repo)
    {
    }

    public function setupInsertProductCategory($params): ProductCategory
    {
        try {
            $category = $this->repo->insert($params);
            if (!$category) {
                return throw new Error('Error Insert Product Category');
            }

            $rates = $params['rates'];
            $ratesInput = [];

            if (!empty($rates)) {
                foreach ($rates as $rate) {
                    $ratesInput[] = [
                        'product_category_id' => $category->id,
                        'rate_id' => $rate['id'] // Incluindo o 'rate_id' necessário
                    ];
                }
                $category->rates()->sync($ratesInput);
            }
            return $category;
        } catch (Throwable $error) {
            if (isset($category->id)) {
                $this->repo->delete($category->id);
            }
        }
    }
}
