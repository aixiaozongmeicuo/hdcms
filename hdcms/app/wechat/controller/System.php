<?php namespace app\wechat\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Wechat;

class System extends Controller{
    //动作
    public function post(Wechat $wechat){
        $model = $wechat->find(1)?:$wechat;
        if (IS_POST){
            $model->save(Request::post());
            return $this->setRedirect('wechat.system.post')->success('操作成功');
        }
        return view('',compact('model'));
    }
}
