<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Image;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;

class ImageController extends Controller
{
    use DisablePagination;

    protected $model = Image::class;
}
