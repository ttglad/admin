<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统配置模型
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class SystemLog extends Model
{

    protected $table = 'admin_system_logs';

    protected $fillable = ['user_id', 'type', 'url', 'content', 'operator_ip'];

    public $timestamps = false;

    protected $dates = ['created_at'];

    /**
     * 操作用户
     * 模型对象关系：系统日志对应的操作用户
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Admin', 'user_id', 'id');
    }
}
