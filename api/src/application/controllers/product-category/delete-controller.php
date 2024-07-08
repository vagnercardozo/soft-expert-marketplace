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
            $this->delete->setupDeleteProductCategory($request);
            return Response::json('Delete');
        } catch (Throwable $error) {
            print($error);
            return Response::json($error, 404);
        }
    }
}
