<?php

namespace Src\Application\Controllers\Rate;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Rate\IListRate;
use Src\Application\Helpers\Response;
use Throwable;

class ListRateController extends Controller
{
    public function __construct(private IListRate $list)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->list->setupListRate();
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
