<?php

namespace Src\Application\Controllers\ProductCategory;

use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductCategory\IShowProductCategory;
use Src\Application\Helpers\Response;
use Throwable;

class ShowProductCategoryController extends Controller
{
    public function __construct(private IShowProductCategory $show)
    {
    }

    protected function perform($request)
    {
        try {
            $result = $this->show->setupShowProductCategory($request);
            return Response::json($result);
        } catch (Throwable $error) {
            return Response::json($error->getMessage(), 404);
        }
    }
}
