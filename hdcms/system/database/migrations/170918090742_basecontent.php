<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class basecontent extends Migration {
    //执行
	public function up() {
		Schema::create( 'basecontent', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('content');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'basecontent' );
    }
}