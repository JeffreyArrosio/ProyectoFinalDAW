<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Comment;
use App\Policies\CommentPolicy;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use DisableAuthorization;

    protected $model = Comment::class;
    protected $policy = CommentPolicy::class;
}
