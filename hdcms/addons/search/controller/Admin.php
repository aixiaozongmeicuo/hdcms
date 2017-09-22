<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 2017/9/21
 * Time: 20:08
 */
namespace addons\search\controller;
use addons\search\model\Search;
use houdunwang\request\Request;
use module\base\Hdcontroller;
use system\model\Article;
use system\model\Category;

class Admin extends Hdcontroller {

    public function lists(){
        $data = Search::get();
        $modules = \system\model\Module::where('is_system', '!=', 1)->get();
        return view($this->template.'lists.php',compact('modules','data'));
    }


   public function search(){

       $tpl = IS_MOBILE ? 'mobile' : 'web';
       $this->temp = 'tpl/' . $tpl;
       //定义常量
       define('__TEMP__', $this->temp);

        //获取用户搜索的关键词
       $keyword = Request::get('keyword');
       if ($keyword){
           //通过关键词找到相关的文章
           $article = Article::where('keyword','like',"%".$keyword."%")->get();
           if ($article){
               $issavekw = Search::where('keyword',$keyword)->first();
               if ($issavekw){
                   Db::table("search")->where('keyword', $keyword)->increment('num', 1);
               }else{
                   $search = new Search();
                   $data =[
                       'keyword'=>$keyword,
                       'num'=>1
                   ];
                   $search->save($data);
               }
           }
           return view($this->template.'search.php',compact('article'));
       }else{
           return $this->error('请输入内容在搜索');
       }

   }


}
