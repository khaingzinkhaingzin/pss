<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
        	'name' => 'Service Provider', 
        	'slug' => 'serviceprovider',
        	'permissions' => [
        		'show_phone_service' => true,
                'update_phone_service' => true,
                'delete_phone_service' => true,
        	]
        ]);

        // Role::create([
        //     'name' => 'Admin', 
        //     'slug' => 'admin',
        //     'permissions' => [
        //         'show_phone_service' => true,
        //     ]
        // ]);
    }
}
