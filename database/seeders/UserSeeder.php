<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'permissionManagement']);
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'productCategory']);
        Permission::create(['name' => 'product']);
        Permission::create(['name' => 'expenseCategory']);
        Permission::create(['name' => 'expense']);
        Permission::create(['name' => 'pos']);
        Permission::create(['name' => 'invoice']);
        Permission::create(['name' => 'report']);
        Permission::create(['name' => 'customerPhone']);
        Permission::create(['name' => 'setting']);


        $role = Role::create(['name' => 'developer']);
        $role->syncPermissions(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions(Permission::all());
        $role->revokePermissionTo('permissionManagement');

        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo('pos');

        $user = new User();
        $user->name = 'Mr. Developer';
        $user->email = 'developer@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('developer');

        $user = new User();
        $user->name = 'Mr. Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('admin');


        $user = new User();
        $user->name = 'Mr. Manager';
        $user->email = 'manager@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('manager');

    }
}
