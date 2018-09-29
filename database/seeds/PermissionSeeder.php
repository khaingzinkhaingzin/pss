<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create([
            'permissions' => [
                "show-phoneservice" => true,
                "update-phoneservice" => true,
                "delete-phoneservice" => true,
                
                "show-serviceproduct" => true,
                "update-serviceproduct" => true,
                "delete-serviceproduct" => true,
                
                "show-doneservice" => true,
                "update-doneservice" => true,
                "delete-doneservice" => true,
                
                "create-employee" => true,
                "show-employee" => true,
                "update-employee" => true,
                "delete-employee" => true,
                
                "show-department" => true,
                "update-department" => true,
                "delete-department" => true,
                
                "show-employeesalary" => true,
                "update-employeesalary" => true,
                "delete-employeesalary" => true,
                
                "show-status" => true,
                "update-status" => true,
                "delete-status" => true,

                "show-employeelist" => true,
                "update-employeelist" => true,
                "delete-employeelist" => true,

                "show-salary" => true,
                "update-salary" => true,
                "delete-salary" => true,
            ]
        ]);
    }
}
