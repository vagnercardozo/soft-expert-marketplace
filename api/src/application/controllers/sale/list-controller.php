<?php

namespace Src\Application\Controllers\Sale;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Sale\IListSale;
use Src\Application\Helpers\Response;
use Throwable;

class ListSaleController extends Controller
{
    public function __construct(private IListSale $list)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->list->setupListSale();
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
