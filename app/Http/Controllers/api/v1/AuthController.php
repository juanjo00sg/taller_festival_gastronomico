<?php

namespace App\Http\Controllers\api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required|string|email|max:255|exists:users',
                'password' => 'required|string|min:7',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], $e->status);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $tokenType = 'Bearer';
        $user = User::where('email', $request['email'])->firstOrFail();

        $user->tokens()->where('name', $tokenType)->delete();
        if ($user->type == 'admin') {
            $abilities = [
                'user:index', 'user:store', 'user:show', 'user:update', 'user:destroy',
                'restaurant:index', 'restaurant:store', 'restaurant:show', 'restaurant:update', 'restaurant:destroy',
                'comment:index', 'comment:store', 'comment:show', 'comment:update', 'comment:destroy',
                'category:index', 'category:store', 'category:show', 'category:update', 'category:destroy',
            ];
        } elseif ($user->type == 'owner') {
            $abilities = [
                'restaurant:index', 'restaurant:store', 'restaurant:show', 'restaurant:update', 'restaurant:destroy',
                'comment:index', 'comment:store', 'comment:show', 'comment:update', 'comment:destroy',
            ];
        } elseif ($user->type == 'user') {
            $abilities = ['comment:index', 'comment:store', 'comment:show', 'comment:update', 'comment:destroy',];
        }

        $token = $user->createToken($tokenType, ($abilities ?? null));

        return response()->json([
            'token' => $token->plainTextToken,
            'type' => $tokenType
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Token revoked'
        ], 200);
    }
}
