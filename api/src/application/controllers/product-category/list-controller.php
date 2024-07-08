<?php

namespace Src\Application\Controllers\ProductCategory;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductType\IListProductCategory;
use Src\Application\Helpers\Response;
use Throwable;

class ListProductCategoryController extends Controller
{
    public function __construct(private IListProductCategory $list)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->list->setupListProductCategory();
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error, 404);
        }
    }
}
