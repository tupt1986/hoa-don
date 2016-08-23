<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
Use App\Donvi;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_manager = Role::where('name','Manager')->first();
        $role_admin = Role::where('name','Admin')->first();
        $donvi = Donvi::find(1);

        $admin = new User();
        $admin -> name= 'Administrator';
        $admin -> username = 'admin';
        $admin -> birthday = '20160101';
        $admin->donvis()->associate($donvi);
        $admin -> save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user -> name= 'test user';
        $user -> username = 'user';
        $user -> birthday = '20160101';
        $user->donvis()->associate($donvi);
        $user -> save();
        $user->roles()->attach($role_user);

        $manager = new User();
        $manager -> name= 'test manager';
        $manager -> username = 'manager';
        $manager -> birthday = '20160101';
        $manager->donvis()->associate($donvi);
        $manager -> save();
        $manager->roles()->attach($role_manager);
    }
}
