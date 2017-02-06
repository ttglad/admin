<?php

/**
 * 多站点 域名、路由、静态资源
 *
 * @author TaoYl <tonneylon@gmail.com>
 */

return [
    'title' => '后台',

    /*
     * 路由配置
     */
    'route' => [

        'group' => ['desktop', 'admin'],

        /*
         * 路由域名绑定
         */
        'domain' => [
            'desktop' => env('DESKTOP_SITE', ''),
            'admin' => env('ADMIN_SITE', ''),
        ],

        /*
         * 路由前缀绑定
         */
        'prefix' => [
            'desktop' => '',
            'admin' => '',
        ],

    ],

    /*
     * 站点多语言设置
     */
    'lang' => [
        'desktop' => [
            'zh-CN',
            'en',
        ],
    ],

    /*
     * 静态资源相关配置
     */
    'asset' => [

        /*
         * 站点对应的静态资源目录
         */
        'directory' => [
            'desktop' => 'assets',
            'admin' => 'back',
        ],
        /*
         * 目录描述性文字
         */
        'description' => [
            'assets' => 'desktop site (frontend) public assets',
            'back' => 'admin site (backend) public assets',
        ],

        /*
         * 静态资源CDN配置
         */
        'cdn' => [
            //'on' or 'off'
            'status'  => 'off',
            'url'     => '',

            #匹配所有资源路径:
            //'pattern' => '/.*/i',
            #仅匹配 `lib/` 打头的资源路径:
            'pattern' => '/^lib\/.*/i',
        ],

        /*
         * 静态资源缩略别名，用于引用 路径较长 的资源，也为了方便后续静态类库的版本升级
         */
        'alias' => [
            'bootstrap.js' => 'lib/bootstrap/3.3.4/js/bootstrap.min.js',
            'bootstrap.css' => 'lib/bootstrap/3.3.4/css/bootstrap.min.css',
            'font-awesome.css' => 'lib/font-awesome/4.5.0/css/font-awesome.min.css',
            'icheck.js' => 'lib/iCheck/1.0.2/icheck.min.js',
            'icheck_all.css' => 'lib/iCheck/1.0.2/all.css',
            'icheck_blue.css' => 'lib/iCheck/1.0.2/square/blue.css',
            'ionicons.css' => 'lib/ionicons/2.0.1/css/ionicons.min.css',
            'html5shiv.js' => 'lib/html5shiv/3.7.3/html5shiv.min.js',
            'respond.js' => 'lib/respond.js/1.4.2/respond.min.js',
            'jquery.js' => 'lib/jQuery/jQuery-2.2.3.min.js',
            'jquery-v1.js' => 'lib/jQuery/jQuery-1.8.3+1.min.js',
            'lato.css' => 'lib/Lato_100.css',
            'open-sans.css' => 'lib/Open+Sans400italic,600italic,400,600.css',
            'source-sans-pro.css' => 'lib/Source+Sans+Pro_300,400,600,700,300italic,400italic,600italic.css',
            'layer.js' => 'lib/layer/2.2/layer.js',
            'chosen.js' => 'lib/chosen/1.3.0/chosen.jquery.min.js',
            'chosen.css' => 'lib/chosen/1.3.0/chosen.css',
            'ckeditor.js' => 'back/plugins/ckeditor/ckeditor.js',
            'my97datepicker.js' => 'lib/My97DatePicker/WdatePicker.js',
            'form.js' => 'lib/form/jquery.form.js',
        ],

    ],

    /*
     * 文件存储相关配置(留作以后扩展)
     */
    'storage' => [

        /*
         * 本地文件存储目录
         */
        'directory' => [
            'uploads',
        ],

        /*
         * 目录描述性文字
         */
        'description' => [
            'uploads' => 'path for user uploaded files',
        ],
    ],

];
