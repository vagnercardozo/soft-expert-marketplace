<?php

namespace Src\Application\Controllers\ProductCategory;

use Error;
use Illuminate\Support\Facades\Response;
use Src\Application\Controllers\Controller;
use Src\Domain\Entities\ProductType\IShowProductCategory;
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
            return json_encode($result);
        } catch (Throwable $error) {
            return new Error($error, 404);
        }
    }
}
