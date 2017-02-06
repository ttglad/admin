<?php

namespace App\Http\Controllers\Admin;

use App\Models\SystemLog;
use Cache;
use DB;
use Illuminate\Http\Request;

/**
 * 我的账户控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class LogController extends AdminController
{
    /**
     * The UserRepository instance.
     */
    protected $user;
    private $log_type = [];


    public function __construct()
    {
        parent::__construct();

        $this->log_type = [
            'session' => '会话',  //会话日志 [登录登出相关]
            'upload' => '上传',  //上传日志 [上传相关，不包括通过编辑器上传的]
            'security' => '安全',  //安全日志
            'system' => '系统',  //系统日志 [系统程序自动触发类型的日志]
            'mail' => '邮件',  //邮件日志 [记录邮件发送相关日志]
            'management' => '管理',  //管理日志 [管理相关，主要包括增改管理员用户、增改角色、修改系统配置参数等]
            'error' => '错误',  //错误日志 [主要记录访问400与500类型的错误]
        ];
    }


    /**
     * 系统配置页面
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getLog(Request $request)
    {
        DB::enableQueryLog();
        $system_logs = new SystemLog();
        $con = $request->all();
        if (isset($con['type']) && !empty($con['type'])) {
            $system_logs = $system_logs->where('type', $con['type']);
        }
        if (isset($con['s_operator_realname']) && !empty($con['s_operator_realname'])) {
            $system_logs = $system_logs->where('user_id', $con['s_operator_realname']);
        }
        if (isset($con['s_operator_ip']) && !empty($con['s_operator_ip'])) {
            $system_logs = $system_logs->where('operator_ip', 'like', '%' . $con['s_operator_ip'] . '%');
        }

        $system_logs = $system_logs->orderBy('id', 'desc')
            ->paginate(cache('page_size', '10'));

        $log_type = $this->log_type;

        return view('admin.back.log.index', compact('system_logs', 'log_type'));
    }


    /**
     * 提交修改系统配置
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        try {
            $sys_log = SystemLog::findOrFail($id);
            $log_type = $this->log_type;
            return view('admin.back.log.show', compact('sys_log', 'log_type'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
