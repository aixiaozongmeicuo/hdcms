<?php namespace app\admin\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use \system\model\Article as a;
use system\model\Keyword;

class Article extends Common {
    //动作
    public function lists(){
        $row = json_decode(v('config.content'),true)['row'];
        $row = $row?:10;
        $data = a::paginate($row);
        return view('',compact('data'));
    }

    //添加数据或修改数据
    public function post(a $a){
        $cid  = Request::get('id');
        $model = $cid? $a ->find($cid) :$a;
        if (IS_POST){//如果有提交数据
            $arr = Request::post();
            //判断是否勾选了is_hot和is_commend
            if ($arr['ishot']==''){
                $arr['ishot']='';
            }
            if ($arr['iscommend']==''){
                $arr['iscommend']='';
            }
            //保存或修改文章
            $model->save($arr);

            $data = [
                'module' => 'news',
                'keyword' => $arr['keyword'],
                'module_id' =>$model['id'],
            ];
            //往keyword表中存数据
            $keyword= new Keyword();
            $keywordmodel = $cid ? Keyword::where('module_id',$cid)->where('module','news')->first():$keyword;
            $keywordmodel->save($data);

            return $this->setRedirect('article.lists')->success('操作成功');
        }
        //获得分类列表的数据
        $dbcategory = \system\model\Category::getCategory();
        return view('',compact('model','dbcategory'));
    }


    //删除数据
    public function delete(a $a){
        $id = Request::get('id');
        $model = $a->find($id);
        $model->destory();
        return $this->setRedirect('article.lists')->success('删除成功');
    }




}
