<?php

namespace Src\Domain\Usecases\ProductCategory;

use Error;
use Src\Domain\Contract\Repositories\ProductCategory\IRepositoryProductCategory as IUpdate;
use Src\Domain\Entities\ProductCategory\IUpdateProductCategory;
use Src\Infra\Repositories\Postgres\Models\ProductCategory;
use Throwable;

class UpdateProductCategory implements IUpdateProductCategory
{
    public function __construct(private IUpdate $repo)
    {
    }

    public function setupUpdateProductCategory($params): ProductCategory
    {
        try {
            $category = $this->repo->update($params);


            if (array_key_exists('rates', $params) && (count($params['rates']) > 0)) {

                $rates = $params['rates'];
                $ratesInput = [];

                foreach ($rates as $rate) {
                    $ratesInput[] = [
                        'product_category_id' => $category->id,
                        'rate_id' => $rate['id']
                    ];
                }
                $category->rates()->sync($ratesInput);
            } else {
                $category->rates()->sync([]);
            }

            return $category;
        } catch (Throwable $error) {
            return throw new Error('Error Product Category');
        }
    }
}
