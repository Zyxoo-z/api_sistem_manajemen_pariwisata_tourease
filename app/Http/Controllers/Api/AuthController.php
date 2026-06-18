<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{
    /**
     * Login User
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        try {
            if (!$token = Auth::guard('api')->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau password salah'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat token'
            ], 500);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Data user yang sedang login
     */
    public function me()
    {
        return response()->json([
            'success' => true,
            'data' => Auth::guard('api')->user()
        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout'
        ]);
    }

    /**
     * Refresh Token
     */
  public function refresh()
{
    $token = JWTAuth::parseToken()->refresh();

    return $this->respondWithToken($token);
}
    /**
     * Format Response Token
     */
    protected function respondWithToken($token)
{
    return response()->json([
        'success' => true,
        'access_token' => $token,
        'token_type' => 'Bearer',
        'expires_in' => config('jwt.ttl') * 60
    ]);
}
}