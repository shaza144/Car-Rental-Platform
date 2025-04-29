<?php

use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    // تسجيل المستخدمين الجدد
    Route::post('register', [AuthController::class, 'register']);

    // تسجيل الدخول
    Route::post('login', [AuthController::class, 'login']);

    // جميع الـ routes التي تحتاج المصادقة
    Route::middleware('auth:sanctum')->group(function () {
        // الحصول على بيانات المستخدم الحالي
        Route::get('me', [AuthController::class, 'me']);

        // تسجيل الخروج
        Route::post('logout', [AuthController::class, 'logout']);

        // التحقق من الصلاحيات والدور
        Route::get('/check-permissions', function (Request $request) {
            return response()->json([
                'roles' => $request->user()->getRoleNames(),
                'permissions' => $request->user()->getPermissionNames(),
            ]);
        });

        // التحقق من الدور و الصلاحيات المحددة
        Route::get('/check-role', function (Request $request) {
            $user = $request->user();
            return [
                'roles' => $user->getRoleNames(),
                'permissions' => $user->getAllPermissions()->pluck('name'),
                'isAdmin' => $user->hasRole('admin'),
                'canManageBookings' => $user->can('manage bookings'),
            ];
        });
    });
});

// فقط للمشرفين يمكنهم الوصول إلى هذه الـ route
Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-panel', fn() => 'Welcome admin');

// Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
//     Route::get('users', [UserController::class, 'index']);
//     Route::delete('users/{id}', [UserController::class, 'destroy']);
// });
Route::prefix('admin')->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('users', UserController::class)->only(['index', 'destroy']);
    Route::post('users/{id}/roles', [UserController::class, 'assignRoles']);
});
Route::middleware('auth:sanctum', 'role:admin')->group(function () {
    // إنشاء دور جديد
    Route::post('roles', [RoleController::class, 'store']);

    // تعيين صلاحيات لدور
    Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermission']);

    // إنشاء صلاحية جديدة
    Route::post('permissions', [PermissionController::class, 'store']);
});
// الوصول إلى معلومات المستخدم من خلال المصادقة
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
