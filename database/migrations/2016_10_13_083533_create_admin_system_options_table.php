<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSystemOptionsTable extends Migration
{
    /*
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('website_keywords','关键词');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_address','');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('website_title','网站标题');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_telephone','400-000-0000');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_full_name','**股份有限公司');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('website_icp','沪ICP备12345678号');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('system_version','5.2');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('page_size','10');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('system_logo','/assets/img/logo.jpg');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('picture_watermark','/assets/img/logo.jpg');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_short_name','**股份有限公司');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('system_author','TaoYl');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('system_author_website','');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('is_watermark','0');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_email','service@example.com');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_qq','4008888888');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_qq_url','http://www.qq.com');
    INSERT  INTO `admin_system_options`(`name`,`value`) VALUES ('company_erweima','/assets/img/erweima.jpg');
    */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_system_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->unique()->comment('配置选项名');
            $table->text('value')->nullable()->comment('配置选项值');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_system_options');
    }
}
