<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 2017/9/21
 * Time: 20:08
 */
namespace addons\links\controller;
use addons\links\model\Links;
use houdunwang\request\Request;
use module\base\Hdcontroller;

class Admin extends Hdcontroller {

    //展示关键词列表
    public function lists(){
        $links = Links::get();
        $modules = \system\model\Module::where('is_system', '!=', 1)->get();
        return view($this->template.'lists.php',compact('links','modules'));
    }

    //添加，修改
    public function post( ){
        $id = Request::get('id');
        $model = $id ? links::find($id):new links();
        if (IS_POST){
            $model->save(Request::post());
            return $this->setRedirect(__ROOT__ . '?m=links&action=controller/admin/lists')->success('操作成功');
        }

        return view($this->template.'post.php',compact('model'));
    }

    //删除
    public function delete(){
        $id = Request::get('id');
        $model = Links::find($id);
        $model->destory();
        return $this->setRedirect(__ROOT__ . '?m=links&action=controller/admin/lists')->success('删除成功');
    }

}
