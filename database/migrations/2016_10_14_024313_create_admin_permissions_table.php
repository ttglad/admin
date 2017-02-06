<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPermissionsTable extends Migration
{
/*insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@cache','缓存',NULL,'2016-04-08 12:28:17','2016-04-08 12:28:17');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('cache-edit','缓存刷新',NULL,'2016-04-08 12:28:17','2016-04-08 12:28:17');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@me','个人资料',NULL,'2016-04-08 12:28:18','2016-04-08 12:28:18');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('me-write','个人资料写入',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@user','用户',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('user-show','用户查看',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('user-write','用户写入',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('user-search','用户搜索',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@role','角色',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('role-show','角色查看',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('role-write','角色写入',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@permission','权限',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('permission-show','权限查看',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('permission-write','权限写入',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@option','系统配置',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('option-show','系统配置查看',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('option-write','系统配置写入',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('@log','系统日志',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('log-show','系统日志查看',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');
insert  into `admin_permissions`(`name`,`display_name`,`description`,`created_at`,`updated_at`) values ('log-search','系统日志搜索',NULL,'2016-04-08 12:28:19','2016-04-08 12:28:19');*/


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->comment('权限名');
            $table->string('display_name', 100)->comment('权限显示名称');
            $table->string('description', 255)->nullable()->comment('权限描述');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_permissions');
    }
}
