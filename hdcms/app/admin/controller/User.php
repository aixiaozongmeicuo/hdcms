<?php namespace app\admin\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;

class User extends Controller{

    public function __construct()
    {
        Middleware::set('loginchecked', ['only' => ['changePassword']]);
    }

    //登录页面
    public function login(\system\model\User $user){
        if (IS_POST){
          return  $user::login(Request::post());
        }
        return view();
    }


    //修改密码
    public function changePassword(\system\model\User $user){
        if (IS_POST){
           if(!$user->changePassword(Request::post())){
              return $this->setRedirect('user.changePassword')->error($user->getError());
           }
            return $this->setRedirect('user.loginout')->success('修改成功');
        }
        return view();
    }


    //退出登录
    public function loginout(){
        Session::del('username');
        Session::del('userid');
        return $this->setRedirect('user.login')->success('退出成功');
    }

    //验证码
    public function code(){
        Code::width(100)->height(40)->fontSize(20)->fontColor('#f00f00')->make();

    }




}
