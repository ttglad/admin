<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRolesTable extends Migration
{
    /*
     INSERT  INTO `admin_roles`(`name`,`display_name`,`description`,`created_at`,`updated_at`) VALUES ('root','超级管理员','','2016-03-03 17:05:04','2016-03-11 11:51:31');
     INSERT  INTO `admin_roles`(`name`,`display_name`,`description`,`created_at`,`updated_at`) VALUES ('admin','管理员','','2016-03-03 17:05:04','2016-03-11 11:51:31');
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->comment('角色名');
            $table->string('display_name', 100)->comment('角色显示名称');
            $table->string('description', 255)->nullable()->comment('角色描述');
            $table->smallInteger('status')->default(1)->comment('角色状态');
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
        Schema::dropIfExists('admin_roles');
    }
}
