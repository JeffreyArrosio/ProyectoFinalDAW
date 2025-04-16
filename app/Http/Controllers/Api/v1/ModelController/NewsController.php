<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\News;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use DisableAuthorization;

    protected $model = News::class;
}

