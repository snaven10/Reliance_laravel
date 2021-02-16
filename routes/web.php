<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
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
Route::get('/admin', [AdminController::class, 'index'])
		->name('home');
Route::middleware(['auth'])->group(function(){
    //rutas de administracion
    //index de administracion
	Route::get('admin', [AdminController::class, 'index'])
        ->name('admin.home')
        ->middleware("permission:admin.home");

    //User
    Route::post('user/search',[UserController::class, 'search'])
        ->name('user.search')
        ->middleware("permission:user.search");
    Route::get('user', [UserController::class, 'index'])
        ->name('user.index')
        ->middleware("permission:user.index");
    Route::get('user/create', [UserController::class, 'create'])
        ->name('user.create')
        ->middleware("permission:user.create");
    Route::post('user', [UserController::class, 'store'])
        ->name('user.store')
        ->middleware("permission:user.create");
    Route::put('user/{id}/newpss',[UserController::class, 'newpss'])
        ->name('user.newpss')
        ->middleware("permission:user.newpss");
    Route::get('user/{user}/edit',[UserController::class, 'edit'])
        ->name('user.edit')
        ->middleware("permission:user.update");
    Route::put('user/{user}',[UserController::class, 'update'])
        ->name('user.update')
        ->middleware("permission:user.update");
    Route::delete('user/{user}',[UserController::class, 'destroy'])
        ->name('user.destroy')
        ->middleware("permission:user.destroy");

    //Role
    Route::get('role', [RoleController::class, 'index'])
        ->name('role.index')
        ->middleware("permission:role.index");
    Route::get('role/create', [RoleController::class, 'create'])
        ->name('role.create')
        ->middleware("permission:role.create");

    //Role and User
    Route::post('store/users/role',[UserRoleController::class, 'store'])
        ->name('roleuser.store')
        ->middleware("permission:user.userrole");
	Route::put('update/users/role', [UserRoleController::class, 'update'])
        ->name('roleuser.update')
        ->middleware("permission:user.userrole");
	Route::delete('destroy/users/{user}/role/{role}', [UserRoleController::class, 'destroy'])
        ->name('roleuser.destroy')
        ->middleware('permission:user.userrole');

    //Permission
    Route::get('permission', [PermissionController::class, 'index'])
        ->name('permission.index')
        ->middleware("permission:permission.index");
    Route::get('permission/create', [PermissionController::class, 'create'])
        ->name('permission.create')
        ->middleware("permission:permission.create");

    //Permission Role
    Route::get('permissionrole', [PermissionRoleController::class, 'index'])
        ->name('permissionrole.index')
        ->middleware("permission:permissionrole.index");
    Route::get('permissionrole/create', [PermissionRoleController::class, 'create'])
        ->name('permissionrole.create')
        ->middleware("permission:permissionrole.create");

});
require __DIR__.'/auth.php';