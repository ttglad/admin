<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 后台管理 权限不足抛出异常响应 中间件
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
class Permission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return response()->view('admin.back.exceptions.deny', array(), 403);
//        return $next($request);
    }
}
