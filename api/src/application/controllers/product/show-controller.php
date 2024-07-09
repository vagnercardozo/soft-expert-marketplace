<?php

namespace Src\Application\Controllers\Product;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Product\IShowProduct;
use Src\Application\Helpers\Response;
use Throwable;

class ShowProductController extends Controller
{
    public function __construct(private IShowProduct $show)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->show->setupShowProduct($request);
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error, 404);
        }
    }
}
