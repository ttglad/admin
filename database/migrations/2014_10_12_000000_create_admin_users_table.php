<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
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
