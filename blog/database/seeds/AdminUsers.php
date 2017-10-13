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
        	'name'  => '华哥',
        	'sex'   => '1',
        	'phone' => 18689486416,
        	'email' => '2563654031@qq.com',
        	'address' => '江西',
        	'status' => '0'
 
        ]);
    }
}
