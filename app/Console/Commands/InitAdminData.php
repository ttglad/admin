<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class InitAdminData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:init-sql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'init admin sql data!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            //新增管理员
            DB::insert('INSERT INTO `admin_users`(`name`,`nickname`,`email`,`phone`,`password`,`remember_token`,`deleted_at`,`created_at`,`updated_at`) VALUES ("admin","管理员","12345678@qq.com","18712345678","$2y$10$ZaMzwd/6kQxCnGIXpnk.BeubQfZ7L49Ud5MK8Tse7RillTqS0ZKZa","",NULL,"2016-09-14 05:27:56","2016-10-13 07:47:51")');

            //新增系统默认参数
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("website_keywords","关键词")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_address","")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("website_title","网站标题")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_telephone","400-000-0000")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_full_name","**股份有限公司")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("website_icp","沪ICP备12345678号")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("system_version","5.2")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("page_size","10")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("system_logo","/assets/img/logo.jpg")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("picture_watermark","/assets/img/logo.jpg")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_short_name","**股份有限公司")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("system_author","TaoYl")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("system_author_website","")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("is_watermark","0")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_email","service@example.com")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_qq","4008888888")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_qq_url","http://www.qq.com")');
            DB::insert('INSERT INTO `admin_system_options`(`name`,`value`) VALUES ("company_erweima","/assets/img/erweima.jpg")');

            //增加权限
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@cache","缓存",NULL,"2016-04-08 12:28:17","2016-04-08 12:28:17")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("cache-edit","缓存刷新",NULL,"2016-04-08 12:28:17","2016-04-08 12:28:17")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@me","个人资料",NULL,"2016-04-08 12:28:18","2016-04-08 12:28:18")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("me-write","个人资料写入",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@user","用户",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("user-show","用户查看",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("user-write","用户写入",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("user-search","用户搜索",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@role","角色",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("role-show","角色查看",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("role-write","角色写入",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@permission","权限",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("permission-show","权限查看",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("permission-write","权限写入",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@option","系统配置",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("option-show","系统配置查看",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("option-write","系统配置写入",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("@log","系统日志",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("log-show","系统日志查看",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');
            DB::insert('INSERT INTO `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ("log-search","系统日志搜索",NULL,"2016-04-08 12:28:19","2016-04-08 12:28:19")');

            //增加初始化角色
            DB::insert('INSERT INTO `admin_roles`(`name`,`display_name`,`description`,`created_at`,`updated_at`) VALUES ("root","超级管理员","","2016-03-03 17:05:04","2016-03-11 11:51:31")');
            DB::insert('INSERT INTO `admin_roles`(`name`,`display_name`,`description`,`created_at`,`updated_at`) VALUES ("admin","管理员","","2016-03-03 17:05:04","2016-03-11 11:51:31")');

            //增加角色对应关系
            DB::insert('INSERT INTO `admin_role_admin` (`user_id`, `role_id`) VALUES (1, 1)');
        } catch (\Exception $e) {
            $this->info('init admin sql data -- error -- ' . $e->getMessage());
        }
    }
}
