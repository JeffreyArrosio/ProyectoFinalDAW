<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Blog;
use App\Policies\BlogPolicy;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $model = Blog::class;
    protected $policy = BlogPolicy::class;
}
