<?php namespace app\admin\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Category as c;
class Category extends Common {


    //展示所有信息
    public function lists(){
        //获得所有信息
        $data = \system\model\Category::getCategory();
        return view('',compact('data'));
    }


    //添加数据或修改数据
    public function post(c $c){
        $cid = Request::get('cid');
        $model = $cid ? c::find($cid) : $c;
        if (IS_POST){//提交数据
            $model ->save(Request::post());
            return $this->setRedirect('category.lists')->success('操作成功');
        }
        $data = \system\model\Category::getCategoryById($model);
        return view('',compact('data','model'));
    }



    //删除数据
    public function delete(c $c){
        $id =Request::get('cid');
        if (!$c->delete($id)){
            return $this->error($c->getError());
        }
        return $this->setRedirect('category.lists')->success('删除成功');
    }


}
