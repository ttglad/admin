<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'admin_roles';

    protected $dates = ['deleted_at'];

	public function getStatusDescAttribute()
    {
        return $this->status == 1 ? '开启' : '关闭';
    }

    public function getStatusClassAttribute()
    {
        return $this->status == 1 ? 'text-green' : 'text-red';
    }

    /**
     * 建立与 permission 关联关系
     */
    public function perms()
    {
        return $this->belongsToMany(Permission::class, 'admin_permission_role', 'role_id', 'permission_id');
    }

    public function givePermissionTo($permission)
    {
        return $this->perms()->save($permission);
    }

    /**
     * 获取可用role
     * @param query $query
     */
    public function scopeIsActive($query)
    {
        return $query->whereStatus(1);
    }

    /**
     * 获取可用role
     * @param query $query
     */
    public function scopeIsSupperAdmin($query)
    {
        $root_id = explode(',', env('ADMIN_ROLE_IDS', 1));

        return $query->whereIn('id', $root_id);
    }

    /**
     * 获取可用role
     * @param query $query
     */
    public function scopeIsNotSupperAdmin($query)
    {
        $root_id = explode(',', env('ADMIN_ROLE_IDS', 1));

        return $query->whereNotIn('id', $root_id);
    }
}
