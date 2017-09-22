<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class slider extends Migration {
    //执行
	public function up() {
		Schema::create( 'slider', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('title');
            $table->string('url');
            $table->smallint('orderby');
            $table->string('thumb');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'slider' );
    }
}