<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\Column;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class ColumnUserController extends RelationController
{
    protected $model = Column::class;

    protected $relation = 'user';
}
