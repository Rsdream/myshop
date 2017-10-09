<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role = [

        	[
        		'name' => 'superadmin',
        		'display_name' => 'superadmin',
        		'description' => '超级管理员',
        	],

        	[
        		'name' => 'admin',
        		'display_name' => 'admin',
        		'description' => '管理员',
        	],

        	[
        		'name' => 'guest',
        		'display_name' => 'guest',
        		'description' => '普通成员',
        	],
        ];

        foreach ($role as $value) {

        	Role::create($value);
        }
    }
}
