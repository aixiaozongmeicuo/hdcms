<?php namespace app\system\controller;

use houdunwang\database\Schema;
use houdunwang\request\Request;
use houdunwang\route\Controller;

class Install extends Controller{

    public function __construct()
    {
        $this->isInstalled();
    }


    //如果用户已经安装，会走进该方法
    public function isInstalled(){
        if (is_file('lock.php'))
            die(view('isInstalled'));
    }

    //版权声明
    public function copyright(){

        return view();

    }

    //安装环境检测
    public function environment(){
        $data =[];
        //获取当前操作系统
        $data['server_software']=$_SERVER['SERVER_SOFTWARE'];
        //获取php版本
        $data['php_version'] = PHP_VERSION;
        //是否支持pdo,gd,curl,openssl等拓展功能
        $data['pdo'] = extension_loaded('pdo');
        $data['gd'] = extension_loaded('gd');
        $data['curl'] = extension_loaded('curl');
        $data['openssl'] = extension_loaded('openssl');
        //检测当前向项目是否有写入文件的权限
        $data['is_write'] = is_writable('.');
        return view('',compact('data'));
    }

    //配置数据库连接方法
    public function database(){
        if (IS_AJAX){
            $config = Request::post();
            $dsn = "mysql:host={$config['host']};dbname={$config['dbbase']}";
            try{
                $pdo = new \PDO($dsn,$config['user'],$config['password']);
                Dir::create('data');
                file_put_contents('data/database.php','<?php return '.var_export($config,true).'; ?>');
                return $this->success('数据库连接成功');
            }catch (\Exception $e){
                return $this->error($e->getMessage());
            }
        }

        return view();
    }

    //创建数据表
    public function tables(){
        ///用cli执行数据迁移创建数据表
        cli('hd migrate:make');
        //数据填充
        cli('hd seed:make');
        //用sql语句生成attachment表
        $str = <<<php
        DROP TABLE IF EXISTS `attachment`;

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '会员编号',
  `name` varchar(80) NOT NULL,
  `filename` varchar(300) NOT NULL COMMENT '文件名',
  `path` varchar(300) NOT NULL COMMENT '文件路径',
  `extension` varchar(10) NOT NULL DEFAULT '' COMMENT '文件类型',
  `createtime` int(10) NOT NULL COMMENT '上传时间',
  `size` mediumint(9) NOT NULL COMMENT '文件大小',
  `data` varchar(100) NOT NULL DEFAULT '' COMMENT '辅助信息',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态',
  `content` text NOT NULL COMMENT '扩展数据内容',
  PRIMARY KEY (`id`),
  KEY `data` (`data`),
  KEY `extension` (`extension`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='附件';
php;
        Schema::sql($str);
        //生成一个文件用来判断是否安装
        touch('lock.php');
        go('system.install.finish');
    }

    //安装完成方法
    public function finish(){

        return view();
    }




}
