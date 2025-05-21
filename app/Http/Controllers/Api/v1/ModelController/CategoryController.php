<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Category;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisablePagination;

class CategoryController extends Controller
{
    use DisablePagination;

    protected $model = Category::class;
}
