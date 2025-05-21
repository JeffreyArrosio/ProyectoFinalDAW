<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Follow;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class FollowController extends Controller
{
    use DisableAuthorization, HasApiTokens;
    protected $model = Follow::class;

    public function findFollow(Request $request)
    {
        $follow = Follow::where('follower_id', $request->follower_id)
            ->where('redactor_id', $request->redactor_id)
            ->first();

        if (!$follow) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json($follow);
    }
}
