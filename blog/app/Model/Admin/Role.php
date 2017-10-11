<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    //关联权限表
    public function permissions()
    {
        return $this->belongsToMany('App\Model\Admin\Permissoin', 'permission_role');
    }
}
