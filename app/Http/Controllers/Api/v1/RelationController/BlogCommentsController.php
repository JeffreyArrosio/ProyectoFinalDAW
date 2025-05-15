<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Relations\Relation;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class BlogCommentsController extends RelationController
{
    protected $model = Blog::class;

    protected $relation = 'comments';
}
