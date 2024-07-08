<?php

namespace Src\Application\Controllers\ProductCategory;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductCategory\IDeleteProductCategory;
use Src\Application\Helpers\Response;
use Throwable;

class DeleteProductCategoryController extends Controller
{
    public function __construct(private IDeleteProductCategory $delete)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->delete->setupDeleteProductCategory($request);
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error, 404);
        }
    }
}
