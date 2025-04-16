<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/{any}', function () {
    return ['Laravel' => app()->version()];
})->where('any', '^(?!api|storage|login|register|auth).*$');;


Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

require __DIR__.'/auth.php';
