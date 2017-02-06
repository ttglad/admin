<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleEditRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Gate;

/**
 * 我的账户控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class RoleController extends AdminController
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
    public function getRole()
    {
        $roles = Role::paginate(cache('page_size', 10));

        return view('admin.back.role.index', compact('roles'));
    }

    /*
     * 增加角色
     */
    public function addRole()
    {
        $permissions = Permission::all();
        return view('admin.back.role.create', compact('permissions'));
    }

    /*
     * 提交角色
     */
    public function addPostRole(RoleRequest $request)
    {
        try {
            $input = $request->all();

            $role = new Role();
            $role->name = e($input['name']);
            $role->status = e($input['status']);
            $role->display_name = e($input['display_name']);
//            $role->description = e($input['description']);

            if ($role->save()) {
                $role->perms()->sync($input['permissions']);
            }

            return redirect()->to(Route('admin_role_add'))->with('message', '成功新增角色！');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->input())->with('fail', $e->getMessage());
        }
    }

    /**
     * 修改角色信息
     *
     * @param int $id
     *
     * @return mixed
     */
    public function editRole($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        $perms = $role->perms()->get();

        $cans = array();
        foreach ($perms as $p) {
            $cans[] = ['id' => $p->id, 'name' => $p->name];
        }

        return view('admin.back.role.edit', compact('role', 'permissions', 'cans'));
    }

    /**
     * @param RoleEditRequest $request
     * @param                 $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPutRole(RoleEditRequest $request, $id)
    {
        try {
            $input = $request->all();

            $role = Role::findOrFail($id);
            $role->name = e($input['name']);
            $role->status = e($input['status']);
            $role->display_name = e($input['display_name']);
            $role->description = e($input['description']);

            if ($role->save()) {
                $role->perms()->sync($input['permissions']);
            }

            return redirect()->to(Route('admin_role_edit', $role->id))->with('message', '修改角色成功！');

        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->input())->with('fail', $e->getMessage());
        }
    }
}
