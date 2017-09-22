<?php namespace app\wechat\controller;

use houdunwang\route\Controller;
use houdunwang\wechat\WeChat;
use system\model\Keyword;
use system\model\Module;

class Api extends Controller{

    public function __construct()
    {
        WeChat::valid();
    }

    //沟通页面
    public function index(){

        //消息管理模块
        $instance =WeChat::instance('message');
        //判断是否是文本消息
        if ($instance->isTextMsg())
        {
            //先通过用户发送的内容去关键词表中找是否有当前关键词被设置
            $this->parsecontent($instance->Content);
            //如果没有匹配到关键词就回复默认设置的内容
            $dafaultmessage = \system\model\Wechat::find(1);
            if ($dafaultmessage){
                $this->parsecontent($dafaultmessage['default_message']);
                $instance->text($dafaultmessage['default_message']);
            }
        }

        //关注事件
        if ($instance->isSubscribeEvent())
        {
            //向用户回复消息
            //如果是关注事件消息,应该从数据库中获取关注事件回复内容
            $message = \system\model\Wechat::find(1);
            $instance->text($message['welcome']);
        }

    }


    //处理是否有关键词匹配的方法
    public function parsecontent($content){
        //通过用户发送的关键字
        $data = Keyword::where('keyword',$content)->first();
        if ($data) {
            $module = Module::where('name', $data['module'])->first();
            $model = $module['is_system'] == 1 ? 'module' : 'addsons';
            //组合类
            $class = $model . '\\' . $data['module'] . '\\system\\Processor';
            call_user_func_array([new $class, 'index'], [$data['module_id']]);

        }
    }







}
