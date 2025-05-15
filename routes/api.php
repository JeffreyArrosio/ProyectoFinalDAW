<?php

use App\Http\Controllers\Api\v1\ModelController\BlogController;
use App\Http\Controllers\Api\v1\ModelController\CategoryController;
use App\Http\Controllers\Api\v1\ModelController\ColumnController;
use App\Http\Controllers\Api\v1\ModelController\CommentController;
use App\Http\Controllers\Api\v1\ModelController\ImageController;
use App\Http\Controllers\Api\v1\ModelController\NewsController;
use App\Http\Controllers\Api\v1\ModelController\UserController;
use App\Http\Controllers\Api\v1\RelationController\BlogCommentsController;
use App\Http\Controllers\Api\v1\RelationController\BlogImagesController;
use App\Http\Controllers\Api\v1\RelationController\BlogCategoryController;
use App\Http\Controllers\Api\v1\RelationController\BlogUserController;
use App\Http\Controllers\Api\v1\RelationController\CategoryColumnsController;
use App\Http\Controllers\Api\v1\RelationController\CategoryNewsController;
use App\Http\Controllers\Api\v1\RelationController\ColumnCommetsController;
use App\Http\Controllers\Api\v1\RelationController\ColumnImagesController;
use App\Http\Controllers\Api\v1\RelationController\ColumnNewsController;
use App\Http\Controllers\Api\v1\RelationController\ColumnUserController;
use App\Http\Controllers\Api\v1\RelationController\CommentCommentableController;
use App\Http\Controllers\Api\v1\RelationController\CommentUserController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Orion\Facades\Orion;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', function (LoginRequest $request) {

    $request->authenticate();

    $user = User::where('email', $request->email)->first();
    

    $token = $user->createToken('react-client')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
});

Route::group(['as' => 'api'], function() {
    
    Orion::resource('blogs', BlogController::class);
    Orion::resource('categories', CategoryController::class);
    Orion::resource('columns', ColumnController::class);
    Orion::resource('comments', CommentController::class);
    Orion::resource('images', ImageController::class);
    Orion::resource('news', NewsController::class);
    Orion::resource('users', UserController::class);

    Orion::morphManyResource('blog', 'comments', BlogCommentsController::class);
    Orion::morphManyResource('blog', 'images', BlogImagesController::class);
    Orion::belongsToResource('blog', 'category', BlogCategoryController::class);
    Orion::belongsToResource('blog', 'user', BlogUserController::class);
    Orion::morphToResource('category', 'columns', CategoryColumnsController::class);
    Orion::morphToResource('category', 'news', CategoryNewsController::class);
    Orion::morphToResource('column', 'comments', ColumnCommetsController::class);
    Orion::morphToResource('column', 'images', ColumnImagesController::class);
    Orion::morphToResource('column', 'news', ColumnNewsController::class);
    Orion::belongsToResource('column', 'user', ColumnUserController::class);
    Orion::morphToResource('comment', 'commentable', CommentCommentableController::class);
    Orion::belongsToResource('comment', 'user', CommentUserController::class);
});
