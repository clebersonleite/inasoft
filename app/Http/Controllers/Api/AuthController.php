<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 5|Ise1WFe3IQdhMZ6LLp31zcPr3wcbdWGbhHzmdY2E28c72ee4

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $accessToken = $request->user()->createToken('general');

            return response()->json([
                'message' => 'Authorized',
                'token' => $accessToken->plainTextToken,
            ], 200);
        }
        return response()->json(['message' => 'NotAuthorized'], 403);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Token Revoked'], 200);
    }
}
