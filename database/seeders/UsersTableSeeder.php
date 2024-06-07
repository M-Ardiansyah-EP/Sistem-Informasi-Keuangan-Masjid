<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $ketuaRole = Role::where('name', 'ketua')->first();
        $adminRole = Role::where('name', 'admin')->first();

        $ketua = User::create([
            'name' => 'Ketua',
            'email' => 'ketua@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'ketua'
        ]);
        $ketua->role()->associate($ketuaRole);
        $ketua->save();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);
        $admin->role()->associate($adminRole);
        $admin->save();
    }
}
