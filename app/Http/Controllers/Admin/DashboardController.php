<?php

namespace App\Http\Controllers\Admin;

/**
 * 快捷控制面板
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class DashboardController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        return view('admin.back.dashboard.index');
    }

}
