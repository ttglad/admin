# ttglad/admin
一个基于Laravel的简单的后台管理系统！

**目前支持 分支 laravel5.3，laravel5.4正在开发中**

## 安装说明
下载源码：
```
git clone https://github.com/ttglad/admin.git
```
**以下安装步骤均在项目根目录下进行：**

增加配置文件：
```
cp .evn.example .env
```
创建数据库，默认使用 `UTF8mb4` 编码，`utf8mb4_general_ci`作为排序规则.

env文件配置介绍，请根据实际服务器配置和数据库配置修改：
详细配置参数可参照laravel官方介绍。
```php
APP_ENV=local
APP_KEY=base64:UzDAeq+Y4+DLuGpncQBQyDkIkhaJ4EJD65rnx4KBFBo=
APP_DEBUG=true
APP_LOG=daily
APP_LOG_LEVEL=debug
#日志数量，配置为0表示不删除，默认为5，指保存5日
APP_LOG_MXA_FILES=0
APP_URL=http://localhost
 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ttcms_admin
DB_USERNAME=root
DB_PASSWORD=
 
BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync
 
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
 
MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
 
PUSHER_KEY=
PUSHER_SECRET=
PUSHER_APP_ID=
 
//配置网站路由，可区分前后台
DESKTOP_SITE=admin.frontend.ttglad.com
ADMIN_SITE=admin.ttglad.com
 
//超级管理员id集合，逗号隔开
ADMIN_ROLE_IDS=1
```

安装composer依赖包
```
composer install
```

导入数据表和数据：
```
php artisan migrate
php artisan admin:init-sql
```

访问配置的后台域名，显示用户登录界面表示安装成功：
默认用户名和密码（admin:admin）

# 参考文档 
laravel官网网站：https://laravel.com

# 联系方式
Email：tonneylon@gmail.com

QQ：492086163