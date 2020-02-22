<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Anshu Mallik',
            'email' => 'anshu@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        $user->syncPermissions($permissions);
    }
}
