<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;

class Loginchecked implements Middleware{
	//执行中间件
	public function run($next) {

	    //进入后台页面验证
         $username = Session::get('username');
         if (!$username){
             die(go(u('admin.user.login')));
         }
         $next();
	}
}