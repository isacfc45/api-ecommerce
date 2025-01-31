<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function index(Request $request)
    {
        return ApiResponse::success($this->userService->listUsers($request->get('per_page', 10)));
    }

    public function show($id)
    {
        return ApiResponse::success($this->userService->findUserById($id));
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->all());
        return ApiResponse::success($user, 'User updated successfully');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return ApiResponse::success(null, 'User deleted successfully');
    }
}
