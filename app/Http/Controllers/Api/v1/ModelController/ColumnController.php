<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Column;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    use DisableAuthorization;

    protected $model = Column::class;
}

