<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class addons_search extends Migration {
    //执行
	public function up() {
		Schema::create( 'search', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('keyword');
            $table->smallint('num');

        });
    }

    //回滚
    public function down() {
        Schema::drop( 'addons_search' );
    }
}