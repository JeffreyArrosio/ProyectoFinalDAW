<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    

    $token = $user->createToken('react-client')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
});
