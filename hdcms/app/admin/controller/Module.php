<?php namespace app\admin\controller;

use houdunwang\dir\Dir;
use houdunwang\request\Request;
use houdunwang\route\Controller;
use houdunwang\view\View;

class Module extends Controller{

    //展示模块首页
    public function lists(){
        $this->isInstallmodule();
        //从数据库中能获得的数据都是已经安装的模板
        $isInstallmodule =\system\model\Module::where('is_system','!=',1)->lists('name');
        //获得文件列表中的数据
        $filemodules = Dir::tree('addons');
        $data = [];
        foreach($filemodules as $k=>$v){
            //取出json文件
            $file = "addons/{$v['filename']}/postDate.json";
            //获取json文件中的数据
            if (is_file($file)){
                $postDate =json_decode(file_get_contents($file),true);
                //给提交的数据添加是否安装的字段
                $postDate['isInstall'] = in_array($v['filename'],$isInstallmodule);
                $data[]=$postDate;
            }
        }
        return view('',compact('data'));
    }

    //安装模块的方法
    public function install(\system\model\Module $module){
        $name = Request::get('name');
        $file = "addons/{$name}/postDate.json";
        $postDate = json_decode(file_get_contents($file),true);
        $postDate['is_system'] = 0;
        //保存数据
        $module->save($postDate);
        return $this->setRedirect('admin.module.lists')->success('安装成功');
    }

    //获取已安装的模板信息，分配模板
    public function isInstallmodule(){
        $modules = \system\model\Module::where('is_system', '!=', 1)->get();
//        p($modules);
        View::with('modules',$modules);
    }



    //添加或修改数据
    public function post(\system\model\Module $module){

        if (IS_POST){
            //创建相应模块的文件夹
            $this->setmodulefile(Request::post('name'));
            //将用户创建模块的数据存入json文件中
            $postDate = json_encode(Request::post(),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            file_put_contents('addons/'.Request::post('name').'/postDate.json',$postDate);

            return $this->setRedirect('module.lists')->success('添加成功');
        }
        return view();
    }


    public function setmodulefile($name){

        //创建所需要的文件夹名
        $arr =['controller','view','model','system'];
        //创建文件夹
        foreach ($arr as $v){
            Dir::create('addons/'.$name.'/'.$v);
        }
        //创建统一处理微信的操作的文件
        $str = <<<hd

<?php
namespace addons\\{$name}\system;
use houdunwang\wechat\WeChat;
class Processor{
    public function index(){
        //此处处理微信操作
    }
}

hd;
        file_put_contents('addons/'.$name.'/system/Processor.php',$str);
    }


    //卸载
    public function delete(){
        //卸载数据
        $name = Request::get('name');
       $model= \system\model\Module::where('name',$name)->first();
        $model->destory();
        //删除文件夹
        Dir::del('addons/'.$name);
        return $this->setRedirect('module.lists')->success('卸载成功');
    }





}
