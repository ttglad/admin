<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSystemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_system_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('用户id');
            $table->string('type', 20)->comment('操作类型');
            $table->string('url', 200)->comment('操作url');
            $table->string('content', 64)->comment('操作内容');
            $table->string('operator_ip', 15)->comment('IP地址');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_system_logs');
    }
}
