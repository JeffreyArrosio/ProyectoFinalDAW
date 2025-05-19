<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\News;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class NewsColumnsController extends RelationController
{

    use DisableAuthorization;
    protected $model = News::class;

    protected $relation = 'columns';
}
