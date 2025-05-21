<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\User;
use App\Policies\UserPolicy;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisablePagination;

class UserController extends Controller
{
    use DisablePagination;

    protected $model = User::class;
    protected $policy = UserPolicy::class;
}