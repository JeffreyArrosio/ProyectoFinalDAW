<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use Orion\Http\Controllers\RelationController;
use App\Models\Follow;

class FollowerRelationController extends RelationController
{
    protected $model = Follow::class;

    protected $relation = 'follower';
}
