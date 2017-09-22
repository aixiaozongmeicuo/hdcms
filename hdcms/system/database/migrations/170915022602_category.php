<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class category extends Migration {
    //执行
	public function up() {
		Schema::create( 'category', function ( Blueprint $table ) {
			$table->increments( 'cid' );
            $table->timestamps();
            $table->string('cname', 50);
            $table->tinyInteger('orderby');
            $table->string('description');
            $table->tinyInteger('pid');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'category' );
    }
}