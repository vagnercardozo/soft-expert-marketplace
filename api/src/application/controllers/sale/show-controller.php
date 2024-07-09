<?php

namespace Src\Application\Controllers\Sale;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Sale\IShowSale;
use Src\Application\Helpers\Response;
use Throwable;

class ShowSaleController extends Controller
{
    public function __construct(private IShowSale $show)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->show->setupShowSale($request);
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
