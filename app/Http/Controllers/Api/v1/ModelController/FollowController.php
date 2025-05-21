<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class FollowController extends Controller
{
    use DisableAuthorization, HasApiTokens;
    protected $model = Follow::class;

    public function findFollow(Request $request)
    {
        $followerId = $request->query('follower_id');
        $redactorId = $request->query('redactor_id');
    
        Log::info("Follower ID: $followerId, Redactor ID: $redactorId");
    
        $follow = Follow::where('follower_id', $followerId)
            ->where('redactor_id', $redactorId)
            ->first();
    
        if (!$follow) {
            return response()->json(['message' => 'Not found'], 404);
        }
    
        return response()->json($follow);
    }
    
}
