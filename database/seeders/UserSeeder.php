<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $roles = Role::all();
        User::updateOrCreate([
            'role_id' => 1,
            'name' => 'Jugol Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        // ->roles()->sync($roles->pluck('id'));

        User::updateOrCreate([
            'role_id' => 2,
            'name' => 'Jugol User',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::updateOrCreate([
            'role_id' => 3,
            'name' => 'Jugol Vendor',
            'email' => 'vendor@mail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
