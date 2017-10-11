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

        	'uid'   => str_random(10),
        	'pass'  => '123456',
        	'name'  => str_random(10),
        	'sex'   => '1',
        	'phone' => 186896864,
        	'email' => str_random(10).'@163.com',
        	'address' => '江西',
        	'power' => '2',
        	'status' => '0'
 
        ]);
    }
}
