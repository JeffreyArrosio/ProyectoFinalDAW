<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/{any}', function () {
    return ['Laravel' => app()->version()];
})->where('any', '.*');;

require __DIR__.'/auth.php';
