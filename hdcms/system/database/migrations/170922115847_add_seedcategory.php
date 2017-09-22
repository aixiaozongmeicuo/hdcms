<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class add_seedcategory extends Migration {
    //执行
	public function up() {
		Schema::table( 'category', function ( Blueprint $table ) {
//			$table->string('name', 50)->add();
			$table->string('thumb')->add();
			$table->string('is_home')->add();
        });
    }

    //回滚
    public function down() {
            //Schema::dropField('category', 'name');
    }
}