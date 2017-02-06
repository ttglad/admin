<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
/*insert  into `admin_users`(`name`,`nickname`,`email`,`phone`,`password`,`remember_token`,`deleted_at`,`created_at`,`updated_at`) values ('admin','管理员','12345678@qq.com','18712345678','$2y$10$ZaMzwd/6kQxCnGIXpnk.BeubQfZ7L49Ud5MK8Tse7RillTqS0ZKZa','wmqvgRv5F06yo7LHq7HdNtwskVrCs5qEN4h5KRNyAOTdCbuDCKXghoaB38c8',NULL,'2016-09-14 05:27:56','2016-10-13 07:47:51');*/

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique()->comment('用户名');
            $table->string('nickname', 20)->comment('用户昵称');
            $table->string('email', 60)->nullable()->comment('用户邮箱');
            $table->string('phone', 12)->nullable()->comment('用户手机');
            $table->string('password')->comment('用户密码');
            $table->rememberToken();
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
        Schema::dropIfExists('admin_users');
    }
}
