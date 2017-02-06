<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeRequest;

/**
 * 我的账户控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class MeController extends AdminController
{
    /**
     * The UserRepository instance.
     */
    protected $user;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 个人资料页面
     *
     * @return Response
     */
    public function getMe()
    {
        $me = auth()->user();
        return view('admin.back.me.index', compact('me'));
    }


    /**
     * 提交修改个人资料
     *
     * @param MeRequest $request
     *
     * @return Response
     */
    public function putMe(MeRequest $request)
    {
        try {
            $user = auth()->user();
            $user->nickname = e($request->input('nickname'));
            $user->phone = e($request->input('phone'));
            $user->email = e($request->input('email'));

            if ($request->input('password') != $request->input('password_confirmation')) {
                throw new \Exception('两次输入的密码不一致！');
            }

            if (!empty($request->input('password')) && !empty($request->input('password_confirmation'))) {
                $user->password = bcrypt(e($request->input('password')));
            }
            $user->save();

            return redirect()->back()->with('message', '成功更新个人资料！');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->input())->with('fail', $e->getMessage());
        }
    }
}
