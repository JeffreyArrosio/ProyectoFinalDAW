<?php

namespace App\Http\Controllers\Api\v1\ModelController;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;
use App\Policies\FollowPolicy;

class FollowController extends Controller
{
    use DisablePagination;
    protected $model = Follow::class;

    protected $policy = FollowPolicy::class;

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
