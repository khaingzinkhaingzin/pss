<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
        	'name' => 'Admin',
        	'email' => 'admin123@gmail.com',
        	'password' => bcrypt('123456'),
        	'is_admin' => true,
        ]);

        // User::create([
        //     'name' => 'Service Provider',
        //     'email' => 'provider@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'is_admin' => false,
        // ]);

        // $user = User::find(1);
        // $role = Role::find(1);

        // $user->roles()->attach($role);
    }
}
