<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\AdminUser;

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

        	'uid'   => '123456',
        	'pass'  => '123456',
        	'name'  => str_random(10),
        	'sex'   => '1',
        	'phone' => 186896864,
        	'email' => str_random(10).'@163.com',
        	'address' => '江西',
        	'status' => '0'
 
        ]);
    }
}
