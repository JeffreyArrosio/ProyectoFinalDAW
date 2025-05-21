<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\News;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class NewsUserController extends RelationController
{

    use DisablePagination;
    protected $model = News::class;

    protected $relation = 'user';
}
