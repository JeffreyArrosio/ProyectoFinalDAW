<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function googleLogin(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $googleUser = Socialite::driver('google')->stateless()->userFromToken($request->token);

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar()
            ]
        );

        // Devuelve token API (con sanctum por ejemplo)
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function facebookLogin(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $facebookUser = Socialite::driver('facebook')->stateless()->userFromToken($request->token);

        $user = User::updateOrCreate(
            ['email' => $facebookUser->getEmail()],
            [
                'name' => $facebookUser->getName(),
                'facebook_id' => $facebookUser->getId(),
                'avatar' => $facebookUser->getAvatar()
            ]
        );

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
