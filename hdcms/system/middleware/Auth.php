<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;
use houdunwang\request\Request;
use system\model\Config;
use system\model\Wechat;

class Auth implements Middleware{

	//全局中间件
	public function run($next) {
        $this->isInstall();
        //用来判断当前项目是否安装了，如果有那么在合并配置项
        if (is_file('lock.php')){
            $this->webconfig();
            $this->setWechatConfig();
        }
        $next();
	}

	//网站有关数据的设置
	public function webconfig(){
        //系统网站名，分页，备案号等配置项
        $config = Config::find(1);
        if ($config){
            v('config',$config->toArray());
        }
    }


    //微信连接配置项
    public function setWechatConfig(){
        //将配置项wechat文件中的配置参数和我们后台设置的参数进行合并,这样可以在后台进行配置项的配置操作
        $model =Wechat ::find(1) ?: new Wechat();
        $content = $model['content'];
        $res = json_decode($content,true);
        if ($res){
            $wechatConfig = array_merge(c('wechat'),$res);
            //再将$wechatConfig设置给wechat配置项
            c('wechat',$wechatConfig);
        }
    }

    //判断用户是否安装过系统
    public function isInstall(){
        //没安装过的代表是没有lock.php文件,应该跳转去安装的第一个页面copyright
        if (!is_file('lock.php') && !preg_match('@system/install@i',Request::get('s'))){
            go('system.install.copyright');
        }

    }


}