<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'admin.home']);
        //User
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.newpss']);
        Permission::create(['name' => 'user.search']);
        Permission::create(['name' => 'user.destroy']);
        //Sucursales
        Permission::create(['name' => 'branch.index']);
        Permission::create(['name' => 'branch.create']);
        Permission::create(['name' => 'branch.update']);
        Permission::create(['name' => 'branch.search']);
        Permission::create(['name' => 'branch.destroy']);
        //location
        Permission::create(['name' => 'location.index']);
        Permission::create(['name' => 'location.create']);
        Permission::create(['name' => 'location.update']);
        Permission::create(['name' => 'location.search']);
        Permission::create(['name' => 'location.destroy']);
        //Role
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        //permission
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permissionrole.index']);
        Permission::create(['name' => 'permissionrole.create']);
        //User and Role
        Permission::create(['name'=>'user.userrole']);
        // create roles and assign created permissions
        Role::create(['name' => 'super-admin']);
        //$role = Role::create(['name' => 'super-admin']);
        //$role->givePermissionTo(Permission::all());
        //$user = User::create(['name' => 'SNAVEN','email' => 'frjsamuel@gmail.com','password'=>Hash::make('SENUFleumas1')]);
        //$user->assignRole('super-admin');

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'vendedor']);

    }
}
