<?php

namespace module\news\system;

use houdunwang\wechat\WeChat;
use module\base\model\Basecontent;
use system\model\Article;

class Processor
{
    public function index($mid)
    {
        //此处处理微信操作
        //在此处回复相应内容
        //通过传递过来的$mid参数去相应的表中找回复内容
        //向用户回复消息
        //用$mid去文章表中获取对应文章内容
        $article = Article::find($mid);
        $news = array(
            array(
                'title' => $article['title'],
                'discription' => $article['discription'],
                'picurl' => __ROOT__ . '/' . $article['thumb'],
                'url' => __ROOT__ . '/' . $article['id'] . '.html'
            )
        );
        $instance = WeChat::instance('message');
        $instance->news($news);
    }
}