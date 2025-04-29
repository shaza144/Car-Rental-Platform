<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function index(): JsonResponse
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function destroy(int $id): JsonResponse
    {
        $this->userService->deleteUser($id);
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function assignRoles(Request $request, int $id): JsonResponse
{
    $validated = $request->validate([
        'roles' => 'required|array',
        'roles.*' => 'string|exists:roles,name',
    ]);

    $this->userService->assignRoles($id, $validated['roles']);

    return response()->json([
        'message' => 'Roles assigned successfully',
    ]);
}

}
