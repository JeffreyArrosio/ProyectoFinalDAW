<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Follow;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
class FollowController extends Controller
{
    use DisableAuthorization;
    protected $model = Follow::class;

}
