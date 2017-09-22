<?php namespace app\wechat\controller;

use houdunwang\request\Request;
use houdunwang\route\Controller;
use system\model\Wechat as w;

class Config extends Controller{


    //设置连接微信的方法
    public function setting(w $w){
        //查找数据库中数据
        $model = $w ->find(1) ?:$w;
        if (IS_POST){
            //保存提交的数据
            $data = [
              'content'=>json_encode(Request::post())
            ];
            $model ->save($data);
            return $this->setRedirect('refresh')->success('操作成功');
        }
        $content = $model['content'];
        $res = json_decode($content,true);
        //当微信没有设置，自动生成token和endodingaeskey
        if (!$res){
            $res['token'] = md5(time());
            $res['encodingaeskey'] = md5(microtime(true)) . '12345678901'; //43-32
        }
        return view('',compact('res'));
    }





}
