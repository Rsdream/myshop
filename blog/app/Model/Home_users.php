<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Home_users extends Model
{
    //一个模型对应一张表， 如果模型名是User,对应表名是users
    protected $table = 'home_users';

    protected $primaryKey = 'id';
}
