<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class article extends Migration {
    //执行
	public function up() {
		Schema::create( 'article', function ( Blueprint $table ) {
			$table->increments( 'id' );
            $table->timestamps();
            $table->string('title');
            $table->string('click');
            $table->text('description');
            $table->text('content');
            $table->string('source');
            $table->string('author');
            $table->string('orderby');
            $table->string('linkurl');
            $table->string('keyword');
            $table->string('iscommend');
            $table->string('ishot');
            $table->string('thumb');
            $table->string('category_pid');
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'article' );
    }
}