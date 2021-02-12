<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    //rutas de administracion
    //index de administracion
	Route::get('admin', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware("permission:admin.home");

    //User
    Route::get('user', [UserController::class, 'index'])
    ->name('user.index')
    ->middleware("permission:user.index");
    Route::get('user/create', [UserController::class, 'create'])
    ->name('user.create')
    ->middleware("permission:user.create");

    //Role
    Route::get('role', [RoleController::class, 'index'])
    ->name('role.index')
    ->middleware("permission:rol.index");
    Route::get('role/create', [RoleController::class, 'create'])
    ->name('role.create')
    ->middleware("permission:role.create");

    //Permission
    Route::get('permission', [PermissionController::class, 'index'])
    ->name('permission.index')
    ->middleware("permission:permission.index");
    Route::get('permission/create', [PermissionController::class, 'create'])
    ->name('permission.create')
    ->middleware("permission:permission.create");

    //Permission Rol
    Route::get('permissionrole', [PermissionRoleController::class, 'index'])
    ->name('permissionrole.index')
    ->middleware("permission:permissionrole.index");
    Route::get('permissionrole/create', [PermissionRoleController::class, 'create'])
    ->name('permissionrole.create')
    ->middleware("permission:permissionrole.create");

});
require __DIR__.'/auth.php';