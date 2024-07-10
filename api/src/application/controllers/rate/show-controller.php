<?php

namespace Src\Application\Controllers\Rate;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Rate\IShowRate;
use Src\Application\Helpers\Response;
use Throwable;

class ShowRateController extends Controller
{
    public function __construct(private IShowRate $show)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->show->setupShowRate($request);
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
