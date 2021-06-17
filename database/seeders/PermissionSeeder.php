<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appDashboardModule = Module::updateOrCreate([ 'name' => 'Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $appDashboardModule->id,
            'name' => 'Access Dashboard',
            'slug' => 'app.access.dashboard',
        ]);

        //roles module and permissions

        $appRoleModule = Module::updateOrCreate([ 'name' => 'Roles']);
        Permission::updateOrCreate([
            'module_id' => $appRoleModule->id,
            'name' => 'Access Roles',
            'slug' => 'app.access.role',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appRoleModule->id,
            'name' => 'Create Roles',
            'slug' => 'app.create.role',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appRoleModule->id,
            'name' => 'View Roles',
            'slug' => 'app.view.role',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appRoleModule->id,
            'name' => 'Edit Roles',
            'slug' => 'app.edit.role',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appRoleModule->id,
            'name' => 'Delete Roles',
            'slug' => 'app.destroy.role',
        ]);

        //user module and permissions

        $appUserModule = Module::updateOrCreate(['name' => 'User']);
        Permission::updateOrCreate([
            'module_id' => $appUserModule->id,
            'name' => 'Access User',
            'slug' => 'app.access.user',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appUserModule->id,
            'name' => 'Create User',
            'slug' => 'app.create.user',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appUserModule->id,
            'name' => 'View User',
            'slug' => 'app.view.user',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appUserModule->id,
            'name' => 'Edit User',
            'slug' => 'app.edit.user',
        ]);
        Permission::updateOrCreate([
            'module_id' => $appUserModule->id,
            'name' => 'Delete User',
            'slug' => 'app.destroy.user',
        ]);

        //category module and permissions

        $appCategoryModule = Module::updateOrCreate([ 'name' => 'Category']);
        Permission::updateOrCreate([
           'module_id' => $appCategoryModule->id,
           'name' => 'Access Category',
           'slug' => 'app.access.category'
        ]);
        Permission::updateOrCreate([
           'module_id' => $appCategoryModule->id,
           'name' => 'Create Category',
           'slug' => 'app.create.category'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appCategoryModule->id,
            'name' => 'View Category',
            'slug' => 'app.view.category'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appCategoryModule->id,
            'name' => 'Edit Category',
            'slug' => 'app.edit.category'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appCategoryModule->id,
            'name' => 'Delete Category',
            'slug' => 'app.destroy.category'
        ]);

        //tags module and permissions

        $appTagsModule = Module::updateOrCreate([ 'name' => 'Tags']);
        Permission::updateOrCreate([
            'module_id' => $appTagsModule->id,
            'name' => 'Access Tags',
            'slug' => 'app.access.tags'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appTagsModule->id,
            'name' => 'Create Tags',
            'slug' => 'app.create.tags'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appTagsModule->id,
            'name' => 'View Tags',
            'slug' => 'app.view.tags'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appTagsModule->id,
            'name' => 'Edit Tags',
            'slug' => 'app.edit.tags'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appTagsModule->id,
            'name' => 'Delete Tags',
            'slug' => 'app.destroy.tags'
        ]);

        //posts module and permissions

        $appPostsModule = Module::updateOrCreate([ 'name' => 'Post']);
        Permission::updateOrCreate([
            'module_id' => $appPostsModule->id,
            'name' => 'Access Post',
            'slug' => 'app.access.post'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appPostsModule->id,
            'name' => 'Create Post',
            'slug' => 'app.view.post'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appPostsModule->id,
            'name' => 'View Post',
            'slug' => 'app.view.post'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appPostsModule->id,
            'name' => 'Edit Post',
            'slug' => 'app.edit.post'
        ]);
        Permission::updateOrCreate([
            'module_id' => $appPostsModule->id,
            'name' => 'Delete Post',
            'slug' => 'app.destroy.post'
        ]);
    }
}
