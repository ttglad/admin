<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Gate;
use Auth;

/**
 * 权限控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class PermissionController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $permission = Permission::all();

        $permissions = [];

        foreach ($permission as $item) {
            if (substr($item->name, 0, 1) == '@') {
                $permissions[substr($item->name, 1)][] = $item;
            } else {
                $key = substr($item->name, 0, strpos($item->name, '-'));
                $permissions[$key][] = $item;
            }
        }
        
        return view('admin.back.permission.index', compact('permissions'));
    }
}
