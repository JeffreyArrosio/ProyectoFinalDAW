<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\User;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;

class UserNewsController extends RelationController
{

    use DisablePagination;
    protected $model = User::class;

    protected $relation = 'news';
}