<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 关于项目

这次写博客主要目的就是记录知识点，问题的解决思路，在平常常遇见的问题记录下来方便日后开发需要:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## 下面是配置文件的简单说明：
	文件名称	配置类型
	app.php	应用相关，如项目名称、时区、语言等
	auth.php	用户授权，如用户登录、密码重置等
	broadcasting.php	事件广播系统相关配置
	cache.php	缓存相关配置
	database.php	数据库相关配置，包括 MySQL、Redis 等
	filesystems.php	文件存储相关配置
	mail.php	邮箱发送相关的配置
	queue.php	队列系统相关配置
	services.php	放置第三方服务配置
	session.php	用户会话相关配置
	view.php	视图存储路径相关配置

## 创建辅助函数
Laravel 提供了很多 辅助函数，有时候我们也需要创建自己的辅助函数。
我们把所有的『自定义辅助函数』存放于 bootstrap/helpers.php 文件中，这里需要新建一个空文件：
指令:
	1、touch bootstrap/helpers.php
	2、在 bootstrap/app.php 文件的最顶部进行加载：``require_once __DIR__ . '/helpers.php'``;

	或
	1、touch bootstrap/helpers.php
	2、在新增 helpers.php 文件之后，还需要在项目根目录下 composer.json 文件中的 autoload 选项里 files 字段加入该文件：
		composer.json
		{
		    ...

		    "autoload": {
		        "psr-4": {
		            "App\\": "app/"
		        },
		        "classmap": [
		            "database/seeds",
		            "database/factories"
		        ],
		        "files": [
		            "app/helpers.php"
		        ]
		    }
		    ...
		}
		修改保存后运行以下命令进行重新加载文件即可：
		3、composer dump-autoload重新加载文件
## 搭建基础布局
	app.blade.php —— 主要布局文件，项目的所有页面都将继承于此页面。
	_header.blade.php —— 布局的头部区域文件，负责顶部导航栏区块。
	_footer.blade.php —— 布局的尾部区域文件，负责底部导航区块。
	[具体相关文件看源码](https://github.com/529834149/2019Blog-project-information)
## 消息提醒实现
	前端:
	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	  @if(session()->has($msg))
	    <div class="flash-message">
	      <p class="alert alert-{{ $msg }}">
	        {{ session()->get($msg) }}
	      </p>
	    </div>
	  @endif
	@endforeach
	后台:
	后面我们只需要往闪存里面存入:
		session()->flash('success', 'This is a success alert—check it out!');
		session()->flash('danger', 'This is a danger alert—check it out!');
		session()->flash('warning', 'This is a warning alert—check it out!');
		session()->flash('info', 'This is a info alert—check it out!');
## Font Awesome 中文网 图标使用
- [使用方法](http://www.fontawesome.com.cn/get-started/)
## Git 实现 Laravel 项目的自动化部署
- [Git自动化部署](https://learnku.com/articles/33689)
## 创建命令
	php artisan make:controller XxxxController 创建控制器
- **[touch](http://www.jademei.cn/ | https://qqphp.com/)**
- [创建文件](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
