<?php

namespace Src\Application\Controllers\Product;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Product\IListProduct;
use Src\Application\Helpers\Response;
use Throwable;

class ListProductController extends Controller
{
    public function __construct(private IListProduct $list)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->list->setupListProduct();
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error, 404);
        }
    }
}
