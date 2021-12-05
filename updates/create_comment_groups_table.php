<?php namespace Dimsog\Comments\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateCommentGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_comments_comment_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->string('table');
            $table->string('column');
            $table->string('value');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_comments_comment_groups');
    }
}