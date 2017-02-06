<?php

namespace App\Http\Controllers\Admin;

use App\Models\SystemOption;
use Illuminate\Http\Request;
use Cache;

/**
 * 我的账户控制器
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class OptionController extends AdminController
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
     * 系统配置页面
     *
     * @return Response
     */
    public function getOption()
    {
        $option = SystemOption::all();
        foreach ($option as $so) {
            $data[$so['name']] = $so['value'];
        }

        return view('admin.back.option.index', compact('data'));
    }


    /**
     * 提交修改系统配置
     *
     * @param Request $request
     *
     * @return Response
     */
    public function putOption(Request $request)
    {
        try {
            $data = $request->input('data');
            if (empty($data) || !is_array($data)) {
                throw new \Exception('提交过来的数据异常!');
            }

            $option = new SystemOption();
            foreach ($data as $name => $key) {
                $option->where(['name' => $name])->update(['value' => e($key)]);

                if (config('cache.default') === 'memcached' || config('cache.default') === 'redis') {
                    Cache::tags('system', 'static')->forever($name, $key);
                } else {
                    Cache::forever($name, $key);
                }
            }

            return redirect()->back()->with('message', '成功更新系统配置！');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->input())->with('fail', $e->getMessage());
        }
    }
}
