<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendedor = User::create(['name' => 'vendedor','email' => 'vendedor@reliancegroup.com','password'=>Hash::make('password')]);
        $vendedor->assignRole('vendedor');
        $admin = User::create(['name' => 'admin','email' => 'admin@reliancegroup.com','password'=>Hash::make('password')]);
        $admin->assignRole('admin');
    }
}
