<?php namespace app\admin\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use  \system\model\Slider as s;
class Slider extends Common {
    //动作
    public function lists(){
        $data = \system\model\Slider::get();
        return view('',compact('data'));
    }

    //添加修改
    public function post(s $s){
        $id = Request::get('id');
       $model = $id? $s->find($id):$s;
        if (IS_POST){
            $model->save(Request::post());
            return $this->setRedirect('slider.lists')->success('操作成功');
        }
        return view('',compact('model'));
    }
    //删除
    public function delete(s $s){
        $id = Request::get('id');
        $model = $s::find($id);
        $model->destory();
        return $this->setRedirect('slider.lists')->success('删除成功');
    }


}
