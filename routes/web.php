<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
 * 前台路由
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
//Route::get('/', function () {
//    return view('welcome');
//});


/*
 * 后台路由
 *
 * @author TaoYl <tonneylon@gmail.com>
 */
Route::group([
    'prefix' => config('site.route.prefix.admin', ''),
    'domain' => config('site.route.domain.admin', ''),
    'namespace' => 'Admin'
], function () {

    /* 登录 和 退出 */
    Route::get('login', 'AuthorityController@getLogin')->name('admin_login');
    Route::post('login', 'AuthorityController@postLogin')->name('admin_post_login');
    Route::get('logout', 'AuthorityController@getLogout')->name('admin_logout');


    Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
        /* 首页 默认登录页 */
        Route::get('/', 'DashboardController@getIndex')->name('admin_home');

        /* 重建缓存 */
        Route::get('cache', 'AssistantController@getRebuildCache')
            ->name('admin_cache')
            ->middleware([
                'can:@cache',
                'can:cache-edit'
            ]);

        /* 开发展示 */
        Route::get('demo/form', 'DemoController@getForm')->name('admin_demo_form');
        Route::get('demo/icon', 'DemoController@getIcon')->name('admin_demo_icon');

        /* 用户管理 */
        Route::get('user', 'UserController@getUser')
            ->name('admin_user')
            ->middleware(['can:@user']);
        Route::get('user/add', 'UserController@addUser')
            ->name('admin_user_add')
            ->middleware([
                'can:@user',
                'can:user-write'
            ]);
        Route::post('user/add', 'UserController@addPostUser')
            ->name('admin_post_user_add')
            ->middleware([
                'can:@user',
                'can:user-write'
            ]);
        Route::get('user/edit/{id}', 'UserController@editUser')
            ->name('admin_user_edit')
            ->middleware([
                'can:@user',
                'can:user-write'
            ]);
        Route::put('user/edit/{id}', 'UserController@editPutUser')
            ->name('admin_put_user_edit')
            ->middleware(['can:@user', 'can:user-write']);

        /* 个人资料修改 */
        Route::get('me', 'MeController@getMe')
            ->name('admin_me')
            ->middleware(['can:@me']);

        Route::put('me', 'MeController@putMe')
            ->name('admin_put_me')
            ->middleware(['can:@me', 'can:me-write']);

        /* 查看权限 */
        Route::get('permission', 'PermissionController@index')
            ->name('admin_permission')
            ->middleware([
                'can:@permission',
                'can:permission-show'
            ]);

        /* 角色管理 */
        Route::get('role', 'RoleController@getRole')
            ->name('admin_role')
            ->middleware(['can:@role']);
        Route::get('role/add', 'RoleController@addRole')
            ->name('admin_role_add')
            ->middleware([
                'can:@role',
                'can:role-write'
            ]);
        Route::post('role/add', 'RoleController@addPostRole')
            ->name('admin_post_role_add')
            ->middleware([
                'can:@role',
                'can:role-write'
            ]);
        Route::get('role/edit/{id}', 'RoleController@editRole')
            ->name('admin_role_edit')
            ->middleware([
                'can:@role',
                'can:role-write'
            ]);
        Route::put('role/edit/{id}', 'RoleController@editPutRole')
            ->name('admin_put_role_edit')
            ->middleware(['can:@role', 'can:role-write']);

        /* 上传文件和图片 */
        Route::get('upload/picture', 'AssistantController@getUploadPicture')->name('admin_picture');
        Route::get('upload/document', 'AssistantController@getUploadDocument')->name('admin_document');
        Route::post('upload/picture', 'AssistantController@postUploadPicture')->name('admin_post_picture');
        Route::post('upload/document', 'AssistantController@postUploadDocument')->name('admin_post_picture');

        /* 系统配置 */
        Route::get('option', 'OptionController@getOption')
            ->name('admin_option')
            ->middleware(['can:@option']);

        Route::put('option', 'OptionController@putOption')
            ->name('admin_put_option')
            ->middleware(['can:@option', 'can:option-write']);

        /* 系统日志 */
        Route::get('log', 'LogController@getLog')
            ->name('admin_log')
            ->middleware(['can:@log']);

        Route::get('admin_log_show/{id}', 'LogController@show')
            ->name('admin_log_show')
            ->middleware(['can:@log', 'can:log-show']);

    });

});