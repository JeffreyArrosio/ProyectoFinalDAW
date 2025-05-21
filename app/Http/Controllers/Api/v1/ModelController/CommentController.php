<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Comment;
use App\Policies\CommentPolicy;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;

class CommentController extends Controller
{
    use DisablePagination;

    protected $model = Comment::class;
    protected $policy = CommentPolicy::class;
}
