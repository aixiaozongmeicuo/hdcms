<?php
namespace module\base\system;
use houdunwang\wechat\WeChat;
use module\base\model\Basecontent;

class Processor{

    public function index($id){
        $content = Basecontent::find($id);
        $instance = WeChat::instance('message');
        $instance->text($content['content']);
    }
}
