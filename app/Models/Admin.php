<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'admin_users';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 关联角色
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role_admin', 'user_id', 'role_id');
    }

    /**
     * 是否拥有某个角色
     *
     * @param $role
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }

    /**
     * 是否拥有某个权限
     *
     * @param $permission
     *
     * @return boolean
     */
    public function hasPermission($permission)
    {
        if ($this->isSupperAdmin()) {
            return true;
        } else {
            return $this->hasRole($permission->roles);
        }
    }

    /**
     * 是否是超管
     */
    public function isSupperAdmin()
    {
        $admin_ids = explode(',', env('ADMIN_ROLE_IDS', 1));
        return in_array($this->roles()->first()->id, $admin_ids);
    }

    /**
     * 是否是超管
     */
    public function isNotSupperAdmin()
    {
        $admin_ids = explode(',', env('ADMIN_ROLE_IDS', 1));
        return !in_array($this->roles()->first()->id, $admin_ids);
    }

    /**
     * 获取状态显示名称
     * @return string
     */
    public function getStatusDescAttribute()
    {
        return $this->status == 1 ? '开启' : '关闭';
    }

    /**
     * 获取状态样式
     * @return string
     */
    public function getStatusClassAttribute()
    {
        return $this->status == 1 ? 'text-green' : 'text-red';
    }
}