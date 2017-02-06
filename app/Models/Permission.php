<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $table = 'admin_permissions';

    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_permission_role', 'permission_id', 'role_id');
    }
}
