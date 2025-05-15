<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\Category;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class CategoryColumnsController extends RelationController
{
    protected $model = Category::class;

    protected $relation = 'columns';
}
