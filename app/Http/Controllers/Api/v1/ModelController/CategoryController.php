<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Category;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;

class CategoryController extends Controller
{
    use DisableAuthorization, DisablePagination;

    protected $model = Category::class;
}
