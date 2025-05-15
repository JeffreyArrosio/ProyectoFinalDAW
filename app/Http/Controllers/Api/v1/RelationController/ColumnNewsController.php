<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\Column;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class ColumnNewsController extends RelationController
{
    protected $model = Column::class;

    protected $relation = 'news';
}
