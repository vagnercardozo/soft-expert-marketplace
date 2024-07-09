<?php

namespace Src\Application\Controllers\Sale;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Sale\IDeleteSale;
use Src\Application\Helpers\Response;
use Throwable;

class DeleteSaleController extends Controller
{
    public function __construct(private IDeleteSale $delete)
    {
    }

    protected function perform($request)
    {
        try {
            $this->delete->setupDeleteSale($request);
            return Response::json('Delete');
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
