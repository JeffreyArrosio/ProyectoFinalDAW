<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\User;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class UserNewsController extends RelationController
{

    use DisableAuthorization;
    protected $model = User::class;

    protected $relation = 'news';
}