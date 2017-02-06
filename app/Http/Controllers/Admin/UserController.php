<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;

/**
 * 我的账户控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class UserController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 管理员列表页面
     *
     * @return Response
     */
    public function getUser(Request $request)
    {
        $users = new Admin();

        $req = $request->all();

        if (!empty($req['s_phone'])) {
            $users = $users->where('phone', e($req['s_phone']));
        }

        if (!empty($req['s_name'])) {
            $users = $users->where('name', 'like', '%' . e($req['s_name']) . '%')
                ->orWhere('nickname', 'like', '%' . e($req['s_name']) . '%');
        }

        $users = $users->paginate(cache('page_size', 10));

        return view('admin.back.user.index', compact('users'));
    }

    /*
     * 增加用户
     */
    public function addUser()
    {
        $roles = Role::isNotSupperAdmin()->isActive()->get();
        return view('admin.back.user.create', compact('roles'));
    }

    /*
     * 提交用户
     */
    public function addPostUser(UserRequest $request)
    {
        try {
            $input = $request->all();

            $user = new Admin();
            $user->name = e($input['name']);
            $user->nickname = e($input['nickname']);
            $user->password = bcrypt(e($input['password']));
            $user->status = e($input['status']);
            $user->email = e($input['email']);
            $user->phone = e($input['phone']);

            if ($user->save()) {
                $user->roles()->attach(e($input['role']));
            }

            return redirect()
                ->to(Route('admin_user_add'))
                ->with('message', '操作成功！');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->input())
                ->with('fail', $e->getMessage());
        }
    }

    /*
     * 修改用户信息
     */
    public function editUser($id)
    {
        $user = Admin::findOrFail($id);

        if ($user->isSupperAdmin() && auth()->user()->isSupperAdmin()) {
            $roles = Role::isActive()->get();
        } else {
            $roles = Role::isNotSupperAdmin()->isActive()->get();
        }

        return view('admin.back.user.edit', compact('user', 'roles'));
    }

    /**
     * @param UserEditRequest $request
     * @param                 $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPutUser(UserEditRequest $request, $id)
    {
        try {
            $user = Admin::findOrFail($id);

            if ($user->isSupperAdmin() && auth()->user()->isNotSupperAdmin()) {
                throw new \Exception('不能修改超级管理员信息！');
            }

            $input = $request->all();

            $user->nickname = e($input['nickname']);
            if (!empty($input['password'])) {
                $user->password = bcrypt(e($input['password']));
            }

            $user->email = e($input['email']);
            $user->phone = e($input['phone']);
            $user->status = e($input['status']);

            if ($user->save()) {
                $user->roles()->sync((array)$input['role']);
            }

            return redirect()
                ->to(Route('admin_user_edit', $user->id))
                ->with('message', '操作成功！');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->input())
                ->with('fail', $e->getMessage());
        }
    }
}
