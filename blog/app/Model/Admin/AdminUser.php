<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    public $timestamps = false;


    //关联角色表
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role', 'role_user');
    }
}
