<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = $this->userService->create($request->all());
        return ApiResponse::success($user, 'User registered successfully', 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = $this->userService->login($request->only('email', 'password'));
        return ApiResponse::success($user, 'User logged in successfully', 200);
    }

    public function logout()
    {
        $this->userService->logout();
        return ApiResponse::success(null, 'User logged out successfully', 200);
    }
}
