<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
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

    //location
        Route::post('location/search',[LocationController::class, 'search'])
            ->name('location.search')
            ->middleware("permission:location.search");
        Route::get('location', [LocationController::class, 'index'])
            ->name('location.index')
            ->middleware("permission:location.index");
        Route::get('locations/{searchs?}', [LocationController::class, 'index'])
            ->name('location.index.search')
            ->middleware("permission:location.index");
        Route::get('location/create', [LocationController::class, 'create'])
            ->name('location.create')
            ->middleware("permission:location.create");
        Route::post('location', [LocationController::class, 'store'])
            ->name('location.store')
            ->middleware("permission:location.create");
        Route::get('location/{location}/edit',[LocationController::class, 'edit'])
            ->name('location.edit')
            ->middleware("permission:location.update");
        Route::put('location/{location}',[LocationController::class, 'update'])
            ->name('location.update')
            ->middleware("permission:location.update");
        Route::delete('location/{location}',[LocationController::class, 'destroy'])
            ->name('location.destroy')
            ->middleware("permission:location.destroy");
    //end location

    //User
        Route::post('user/search',[UserController::class, 'search'])
            ->name('user.search')
            ->middleware("permission:user.search");
        Route::get('user', [UserController::class, 'index'])
            ->name('user.index')
            ->middleware("permission:user.index");
        Route::get('users/{searchs?}', [UserController::class, 'index'])
            ->name('user.index.search')
            ->middleware("permission:user.index");
        Route::get('user/create', [UserController::class, 'create'])
            ->name('user.create')
            ->middleware("permission:user.create");
        Route::post('user', [UserController::class, 'store'])
            ->name('user.store')
            ->middleware("permission:user.create");
        Route::get('user/{user}/edit',[UserController::class, 'edit'])
            ->name('user.edit')
            ->middleware("permission:user.update");
        Route::put('user/{user}',[UserController::class, 'update'])
            ->name('user.update')
            ->middleware("permission:user.update");
        Route::delete('user/{user}',[UserController::class, 'destroy'])
            ->name('user.destroy')
            ->middleware("permission:user.destroy");
        Route::put('user/{id}/newpss',[UserController::class, 'newpss'])
            ->name('user.newpss')
            ->middleware("permission:user.newpss");
    //end User

    //suppliers
        Route::post('supplier/search',[SupplierController::class, 'search'])
            ->name('supplier.search')
            ->middleware("permission:supplier.search");
        Route::get('supplier', [SupplierController::class, 'index'])
            ->name('supplier.index')
            ->middleware("permission:supplier.index");
        Route::get('suppliers/{searchs?}', [SupplierController::class, 'index'])
            ->name('supplier.index.search')
            ->middleware("permission:supplier.index");
        Route::get('supplier/create', [SupplierController::class, 'create'])
            ->name('supplier.create')
            ->middleware("permission:supplier.create");
        Route::post('supplier', [SupplierController::class, 'store'])
            ->name('supplier.store')
            ->middleware("permission:supplier.create");
        Route::get('supplier/{supplier}/edit',[SupplierController::class, 'edit'])
            ->name('supplier.edit')
            ->middleware("permission:supplier.update");
        Route::put('supplier/{supplier}',[SupplierController::class, 'update'])
            ->name('supplier.update')
            ->middleware("permission:supplier.update");
        Route::delete('supplier/{supplier}',[SupplierController::class, 'destroy'])
            ->name('supplier.destroy')
            ->middleware("permission:supplier.destroy");
    //end suppliers

    //branch offices
        Route::post('branch/search',[BranchController::class, 'search'])
            ->name('branch.search')
            ->middleware("permission:branch.search");
        Route::get('branch', [BranchController::class, 'index'])
            ->name('branch.index')
            ->middleware("permission:branch.index");
        Route::get('branchs/{searchs?}', [BranchController::class, 'index'])
            ->name('branch.index.search')
            ->middleware("permission:branch.index");
        Route::get('branch/create', [BranchController::class, 'create'])
            ->name('branch.create')
            ->middleware("permission:branch.create");
        Route::post('branch', [BranchController::class, 'store'])
            ->name('branch.store')
            ->middleware("permission:branch.create");
        Route::get('branch/{branch}/edit',[BranchController::class, 'edit'])
            ->name('branch.edit')
            ->middleware("permission:branch.update");
        Route::put('branch/{branch}',[BranchController::class, 'update'])
            ->name('branch.update')
            ->middleware("permission:branch.update");
        Route::delete('branch/{branch}',[BranchController::class, 'destroy'])
            ->name('branch.destroy')
            ->middleware("permission:branch.destroy");
    //end branch offices

    //Role
        Route::get('role', [RoleController::class, 'index'])
            ->name('role.index')
            ->middleware("permission:role.index");
        Route::get('roles/{searchs?}', [RoleController::class, 'index'])
            ->name('role.index.search')
            ->middleware("permission:role.index");
        Route::get('role/create', [RoleController::class, 'create'])
            ->name('role.create')
            ->middleware("permission:role.create");
    //end Role

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
    //end Role and User

    //Permission
        Route::post('permission/search',[PermissionController::class, 'search'])
            ->name('permission.search')
            ->middleware("permission:supplier.search");
        Route::get('permission', [PermissionController::class, 'index'])
            ->name('permission.index')
            ->middleware("permission:permission.index");
        Route::get('permissions/{searchs?}', [PermissionController::class, 'index'])
            ->name('permission.index.search')
            ->middleware("permission:permission.index");
        Route::get('permission/create', [PermissionController::class, 'create'])
            ->name('permission.create')
            ->middleware("permission:permission.create");
        Route::post('permission', [PermissionController::class, 'store'])
            ->name('permission.store')
            ->middleware("permission:permission.create");
        Route::get('permission/{permission}/edit',[PermissionController::class, 'edit'])
            ->name('permission.edit')
            ->middleware("permission:permission.update");
        Route::put('permission/{permission}',[PermissionController::class, 'update'])
            ->name('permission.update')
            ->middleware("permission:permission.update");
        Route::delete('permission/{permission}',[PermissionController::class, 'destroy'])
            ->name('permission.destroy')
            ->middleware("permission:permission.destroy");
    //end Permission

    //Permission Role
        Route::get('permissionrole', [PermissionRoleController::class, 'index'])
            ->name('permissionrole.index')
            ->middleware("permission:permissionrole.index");
        Route::get('permissionroles/{searchs?}', [PermissionRoleController::class, 'index'])
            ->name('permissionrole.index.search')
            ->middleware("permission:permissionrole.index");
        Route::get('permissionrole/create', [PermissionRoleController::class, 'create'])
            ->name('permissionrole.create')
            ->middleware("permission:permissionrole.create");
    //end Permission Role

});
require __DIR__.'/auth.php';
