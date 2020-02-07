<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	
       $roles = [
       	['role_name'=> 'admin', 'description'=> 'can do all'],
       	['role_name' => 'editor', 'description'=> 'can edit content from any author but can not create'],
       	 ['role_name'=> 'author', 'description'=> 'can create content, edit only his created contents']];

       \App\Models\Role::insert($roles);
    }
}
