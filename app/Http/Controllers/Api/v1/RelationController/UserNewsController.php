<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\User;
use App\Policies\UserPolicy;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisablePagination;

class UserNewsController extends RelationController
{

    use DisablePagination, HasApiTokens;
    protected $model = User::class;

    protected $relation = 'news';

    protected $policy = UserPolicy::class;
}