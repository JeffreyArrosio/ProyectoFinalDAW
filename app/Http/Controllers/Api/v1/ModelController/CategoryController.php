<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Category;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use DisableAuthorization;

    protected $model = Category::class;
}
