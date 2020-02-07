<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        		['role_id'=> '1', 'create_action'=> '1', 'update_action'=> '1', 'delete_action'=> '1'],
        		['role_id'=> '2', 'create_action'=> '0', 'update_action'=> '1', 'delete_action'=> '1'],
        		['role_id'=> '3', 'create_action'=> '1', 'update_action'=> '0', 'delete_action'=> '0']
        ];

       \App\Models\Permission::insert($permission);
    }
}
