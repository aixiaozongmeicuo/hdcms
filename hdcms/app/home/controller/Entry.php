<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\home\controller;

use app\admin\controller\Article;
use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Category;
use system\model\Module;
use system\model\User;

class Entry extends Controller
{
    protected $template;

    public function __construct()
    {
        $this->runmodule();
        $tpl = IS_MOBILE?'mobile':'web';
        $this->template = 'tpl/'.$tpl;
        //定义常量
        define('__TEMPLATE__',$this->template);
    }

    //展示前台首页的方法
    public function index()
    {
        return view($this->template.'/index.html');
    }

    //加载前台文章内容的方法
    public function content(){
        //获得id
        $id = Request::get('id');
        $article = \system\model\Article::find($id);
//        dd($data);
        //获得分类列表的内容
        $categorylist = Category::find($article['category_pid']);
        //处理文章被访问后,点击次数 click +1的方法
        Db::table("article")->where('id',$id)->increment('click',1);
        //获得除本身之外的所有分类
        $categorycw = Category::where('cid','!=',$id)->where('pid',0)->get();
        return view($this->template . '/content.html',compact('article','categorylist','categorycw'));
    }


    //加载前台分类列表的方法
    public function lists(){
        //获得分类标的内容
        $id = Request::get('id');
        $category = Category::find($id);
//        dd($category);
        //获得除本身之外的所有分类
        $categorycw = Category::where('cid','!=',$id)->where('pid',0)->get();
        return view($this->template.'/lists.html',compact('category','categorycw'));
    }


    //加载前台主题的方法
    public function home(){
        $id = Request::get('id');
        //获得父级分类的图片
        $categorys = Category::find($id);
        //获得除本身之外的所有分类
        $categorycw = Category::where('cid','!=',$id)->where('pid',0)->get();
        return view($this->template.'/home.html',compact('categorys','categorycw'));
    }




    public function runmodule(){
//        echo '1';
        //获得模型
        $m = Request::get('m');
        //获得控制和方法
        $action = Request::get('action');
        $info = explode('/',$action);
        //判断当前的模型是否属于系统模块
        $re = Module::where('name',$m)->first();
        if ($re){
            $module =  $re['is_system']==1?'module':'addons';
            //组合类
            $class = $module.'\\'.$m.'\\'.'controller\\'.ucfirst($info[1]);
            die(call_user_func_array([new $class,$info[2]],[]));
        }

    }


}