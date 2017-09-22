<?php namespace app\admin\controller;

use houdunwang\route\Controller;

class Common extends Controller{
    //动作
    public function __construct()
    {
        Middleware::set('loginchecked');

    }
}
