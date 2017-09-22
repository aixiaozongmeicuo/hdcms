<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class wechat extends Migration {
    //执行
	public function up() {
		Schema::create( 'wechat', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('content');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'wechat' );
    }
}