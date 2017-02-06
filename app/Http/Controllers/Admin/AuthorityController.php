<?php

namespace App\Http\Controllers\Admin;

use App\Events\SystemLogEvent;
use Auth;
use Illuminate\Http\Request;


/**
 * 后台管理员用户登录统一认证
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class AuthorityController extends AdminController
{

    /**
     * 添加路由过滤中间件
     */
    public function __construct()
    {

    }

    /*
     * 显示登录页面
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /*
     * 登录提交
     */
    public function postLogin(Request $request)
    {
        if (Auth::attempt([
            'name' => $request->input('username'),
            'password' => $request->input('password'),
        ], $request->has('remember'))
        ) {
            event(new SystemLogEvent('session', '用户登录'));
            return redirect()->intended(site_path('/', 'admin'));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['attempt' => '“用户名”、“密码”错误，请重新登录或联系超管！']);
        }
    }

    /*
     * 用户退出登录
     */
    public function getLogout()
    {
        event(new SystemLogEvent('session', '退出登录'));
        Auth::logout();
        return redirect()->to(site_path('login', 'admin'));
    }
}
