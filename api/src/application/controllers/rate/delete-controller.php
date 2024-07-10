<?php

namespace Src\Application\Controllers\Rate;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\Rate\IDeleteRate;
use Src\Application\Helpers\Response;
use Throwable;

class DeleteRateController extends Controller
{
    public function __construct(private IDeleteRate $delete)
    {
    }

    protected function perform($request)
    {
        try {
            $this->delete->setupDeleteRate($request);
            return Response::json('Delete');
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
