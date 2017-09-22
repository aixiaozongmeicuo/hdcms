<?php namespace app\admin\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use \system\model\Config as c;
class Config extends Common {
    //动作
    public function post(){

        $model = c::find(1)? c::find(1): new c();
        $re = json_decode($model['content'],true);
        if (IS_POST){
            $data = [
                'content'=>json_encode(Request::post())
            ];
            $model->save($data);
            return $this->setRedirect('config.post')->success('操作成功');
        }

        return view('',compact('re'));
    }
}
