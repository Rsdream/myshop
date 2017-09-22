<?php

use Illuminate\Database\Seeder;

class AdminUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_users')->insert([

        	'uid'   => 'huazai',
        	'pass'  => '123456',
        	'name'  => str_random(10),
        	'sex'   => '1',
        	'phone' => 186896864,
        	'email' => str_random(10).'@163.com',
        	'address' => '江西',
        	'power' => '3',
        	'status' => '0'
 
        ]);
    }
}
