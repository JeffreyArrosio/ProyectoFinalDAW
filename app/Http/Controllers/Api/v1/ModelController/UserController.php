<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\User;
use App\Policies\UserPolicy;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class UserController extends Controller
{
    use DisableAuthorization;

    protected $model = User::class;
    protected $policy = UserPolicy::class;
}