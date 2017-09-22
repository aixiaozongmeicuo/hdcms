<?php
/**
 * Created by PhpStorm.
 * User: hb
 * Date: 2017/9/18
 * Time: 20:22
 */
namespace module\base\controller;
use houdunwang\request\Request;
use module\base\Hdcontroller;
use module\base\model\Basecontent;
use system\model\Keyword;

class Wx extends Hdcontroller {

    //关键字列表展示
    public function lists(){
       $data = Db::table('keyword')->Join('basecontent','keyword.module_id','=','basecontent.id')->where('module',Request::get('m'))->get();
        return view($this->template.'lists.php',compact('data'));
    }

    //添加或修改
    public function post(){
        $id =Request::get('id');
        $bc = new  Basecontent();
        $kw = new Keyword();
        $basecontent = $bc->find($id)?:$bc;
        $dbkeyword = $kw->where('module_id',$id)->first()?:$kw;
        if (IS_POST){
            //保存回复内容
            $datacontent = [
                'content'=>Request::post('content')
            ];
            $basecontent ->save($datacontent);

            //保存关键字
            //判断关键字是否已存在
            $re = Keyword::where('keyword',Request::post('keyword'))->get();
            if ($re[0]['module']=='base'){
                return $this->setRedirect(__ROOT__.url('Wx/post'))->error('该关键词已存在');
            }
            $keyword = [
                'module'=>Request::get('m'),
                'keyword'=>Request::post('keyword'),
                'module_id'=>$basecontent['id'],
            ];;
            $dbkeyword->save($keyword);
            return $this->setRedirect(__ROOT__.url('Wx/lists'))->success('操作成功');
        }
        return view($this->template.'post.php',compact('basecontent','dbkeyword'));
    }

    //删除数据
    public function delete(){
        $id = Request::get('id');
        $bc = new  Basecontent();
        $kw = new Keyword();
        $basecontent = $bc->find($id);
        $dbkeyword = $kw->where('module_id',$id)->first();
        $basecontent->destory();
        $dbkeyword->destory();
        return $this->setRedirect(__ROOT__.url('Wx/lists'))->success('删除成功');
    }

}