<?php

namespace App\Http\Controllers\Api\v1\RelationController;

use App\Models\Comment;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class CommentCommentableController extends RelationController
{
    protected $model = Comment::class;

    protected $relation = 'commentable';
}
