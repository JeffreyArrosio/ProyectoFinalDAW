<?php

use App\Http\Controllers\Api\v1\ModelController\BlogController;
use App\Http\Controllers\Api\v1\ModelController\CategoryController;
use App\Http\Controllers\Api\v1\ModelController\ColumnController;
use App\Http\Controllers\Api\v1\ModelController\CommentController;
use App\Http\Controllers\Api\v1\ModelController\ImageController;
use App\Http\Controllers\Api\v1\ModelController\NewsController;
use App\Http\Controllers\Api\v1\ModelController\UserController;
use App\Http\Controllers\Api\v1\ModelController\FollowController;
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
use App\Http\Controllers\Api\v1\RelationController\NewsColumnsController;
use App\Http\Controllers\Api\v1\RelationController\NewsCommentsController;
use App\Http\Controllers\Api\v1\RelationController\NewsImagesController;
use App\Http\Controllers\Api\v1\RelationController\NewsCategoryController;
use App\Http\Controllers\Api\v1\RelationController\NewsUserController;
use App\Http\Controllers\Api\v1\RelationController\FollowerRelationController;
use App\Http\Controllers\Api\v1\RelationController\RedactorRelationController;
use App\Http\Controllers\Api\v1\RelationController\UserFollowingController;
use App\Http\Controllers\Api\v1\RelationController\UserFollowersController;
use App\Http\Controllers\Api\v1\RelationController\UserNewsController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Orion\Facades\Orion;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signin', function (Request $request) {
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'img' => 'nullable|url',
        'type' => 'in:standard,premium,writer',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Errores de validación',
            'errors' => $validator->errors()
        ], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'img' => $request->img ?? 'https://i.pinimg.com/736x/08/d3/4e/08d34e4c00716bb8ad85f09e8291cbf8.jpg',
        'password' => Hash::make($request->password),
        'type' => $request->type ?? 'standard',
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Usuario registrado correctamente',
        'user' => $user,
        'token' => $token,
    ], 201);
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

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {

    $request->user()->tokens()->delete();

    return response()->noContent();
});

Route::get('/follows/find', [FollowController::class, 'findFollow'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Orion::resource('blogs', BlogController::class);
    Orion::resource('categories', CategoryController::class);
    Orion::resource('columns', ColumnController::class);
    Orion::resource('comments', CommentController::class);
    Orion::resource('images', ImageController::class);
    Orion::resource('news', NewsController::class);
    Orion::resource('users', UserController::class);
    Orion::resource('follows', FollowController::class);

    Orion::morphManyResource('blog', 'comments', BlogCommentsController::class);
    Orion::morphManyResource('blog', 'images', BlogImagesController::class);
    Orion::belongsToResource('blog', 'category', BlogCategoryController::class);
    Orion::belongsToResource('blog', 'user', BlogUserController::class);
    Orion::morphToResource('category', 'columns', CategoryColumnsController::class);
    Orion::morphToResource('category', 'news', CategoryNewsController::class);
    Orion::morphManyResource('column', 'comments', ColumnCommetsController::class);
    Orion::morphToResource('column', 'images', ColumnImagesController::class);
    Orion::morphToResource('column', 'news', ColumnNewsController::class);
    Orion::belongsToResource('column', 'user', ColumnUserController::class);
    Orion::morphToResource('comment', 'commentable', CommentCommentableController::class);
    Orion::belongsToResource('comment', 'user', CommentUserController::class);
    Orion::morphToResource('news', 'columns', NewsColumnsController::class);
    Orion::morphManyResource('news', 'comments', NewsCommentsController::class);
    Orion::morphToResource('news', 'images', NewsImagesController::class);
    Orion::belongsToResource('news', 'category', NewsCategoryController::class);
    Orion::belongsToResource('news', 'user', NewsUserController::class);
    Orion::belongsToResource('users', 'followers', FollowerRelationController::class);
    Orion::belongsToResource('users', 'redactor', RedactorRelationController::class);
    Orion::hasManyResource('users', 'following', UserFollowingController::class);
    Orion::hasManyResource('users', 'followers', UserFollowersController::class);
    Orion::hasManyResource('users', 'news', UserNewsController::class);
});
