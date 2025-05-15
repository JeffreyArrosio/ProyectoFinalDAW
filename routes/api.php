<?php

use App\Http\Controllers\Api\v1\ModelController\BlogController;
use App\Http\Controllers\Api\v1\ModelController\CategoryController;
use App\Http\Controllers\Api\v1\ModelController\ColumnController;
use App\Http\Controllers\Api\v1\ModelController\CommentController;
use App\Http\Controllers\Api\v1\ModelController\ImageController;
use App\Http\Controllers\Api\v1\ModelController\NewsController;
use App\Http\Controllers\Api\v1\ModelController\UserController;
use App\Http\Controllers\Api\v1\RelationController\BlogCommentsController;
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
    
});
