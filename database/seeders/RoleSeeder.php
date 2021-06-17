<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all();
        Role::updateOrCreate([
            'name'      => 'admin',
            'slug'      => Str::slug('admin'),
            'deletable' => false,
        ])->permissions()->sync($permission->pluck('id')) ;

        Role::updateOrCreate([
            'name'      => 'user',
            'slug'      => Str::slug('user'),
            'deletable' => false,
        ]) ;

        Role::updateOrCreate([
           'name'      => 'Customer',
           'slug'      => Str::slug('customer'),
           'deletable' => false,
        ]);
        Role::updateOrCreate([
           'name'      => 'Vendor',
           'slug'      => Str::slug('Vendor'),
           'deletable' => false,
        ]);
    }
}
