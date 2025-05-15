<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\Blog;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class BlogCategoryController extends RelationController
{
    
    protected $model = Blog::class;

    protected $relation = 'category';
}
