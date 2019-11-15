<?php
	use Illuminate\Support\Str;
	/**
	*
	*此方法会将当前请求的路由名称转换为 CSS 类名称，作用是允许我们针对某个页面做页面样式定制。
	*/
	function route_class()
	{
	    return str_replace('.', '-', Route::currentRouteName());
	}
	
	function make_excerpt($value, $length = 200)
	{
		$excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
		return Str::limit($excerpt, $length);
	}