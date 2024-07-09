<?php

namespace Src\Application\Controllers\Product;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Product\IDeleteProduct;
use Src\Application\Helpers\Response;
use Throwable;

class DeleteProductController extends Controller
{
    public function __construct(private IDeleteProduct $delete)
    {
    }

    protected function perform($request)
    {
        try {
            $this->delete->setupDeleteProduct($request);
            return Response::json('Delete');
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
