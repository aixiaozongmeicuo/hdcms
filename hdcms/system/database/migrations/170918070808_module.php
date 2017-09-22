<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class module extends Migration {
    //执行
	public function up() {
		Schema::create( 'module', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('name');
            $table->string('title');
            $table->string('resume');
            $table->string('author');
            $table->string('preview');
            $table->string('is_system');
            $table->string('is_wechat');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'module' );
    }
}