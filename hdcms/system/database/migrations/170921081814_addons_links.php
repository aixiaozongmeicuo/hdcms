<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class addons_links extends Migration {
    //执行
	public function up() {
		Schema::create( 'links', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('title');
            $table->string('url');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'addons_links' );
    }
}