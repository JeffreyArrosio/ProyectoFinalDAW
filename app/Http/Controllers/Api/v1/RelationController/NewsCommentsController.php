<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\News;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class NewsCommentsController extends RelationController
{
    protected $model = News::class;

    protected $relation = 'comments';
}
