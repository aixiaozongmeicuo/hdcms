<?php namespace system\database\seeds;
use houdunwang\database\build\Seeder;
use houdunwang\db\Db;
class module extends Seeder {
    //执行
	public function up() {
		//Db::table('news')->insert(['title'=>'后盾人']);
        Db::table('module')->insert(['name'=>'base','title' => '微信回复模块','resume' => '微信回复模块','author' => 'houdun85','preview' => '','is_system'=> 1,'is_wechat' => 1]);
        Db::table('module')->insert(['name'=>'news','title' => '微信图文回复','resume' => '微信图文回复模块','author' => 'houdun85','preview' => '','is_system'=> 1,'is_wechat' => 1]);

    }
    //回滚
    public function down() {

    }
}