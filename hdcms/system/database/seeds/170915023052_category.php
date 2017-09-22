<?php namespace system\database\seeds;
use houdunwang\database\build\Seeder;
use houdunwang\db\Db;
class category extends Seeder {
    //执行
	public function up() {
		//Db::table('news')->insert(['title'=>'后盾人']);
        Db::table('category')->insert(['cname'=>'电子产品','orderby'=>1,'description'=>'电子产品','pid'=>0]);
        Db::table('category')->insert(['cname'=>'生活用品','orderby'=>1,'description'=>'生活用品','pid'=>0]);
        Db::table('category')->insert(['cname'=>'手机','orderby'=>1,'description'=>'手机','pid'=>1]);
        Db::table('category')->insert(['cname'=>'电脑','orderby'=>1,'description'=>'电脑','pid'=>1]);
        Db::table('category')->insert(['cname'=>'国产手机','orderby'=>1,'description'=>'国产手机','pid'=>3]);
        Db::table('category')->insert(['cname'=>'外国手机','orderby'=>1,'description'=>'国外手机','pid'=>3]);
        Db::table('category')->insert(['cname'=>'华为手机','orderby'=>1,'description'=>'华为','pid'=>5]);
    }
    //回滚
    public function down() {

    }
}