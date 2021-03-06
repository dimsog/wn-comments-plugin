<?php namespace Dimsog\Comments\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('group_id');
            $table->unsignedInteger('parent_id')->default(0)->index();
            $table->unsignedInteger('user_id')->default(0)->index();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedTinyInteger('active')->default(0)->index();
            $table->timestamp('deleted_at')->nullable()->index();

            $table->foreign('group_id')->references('id')->on('dimsog_comments_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_comments');
    }
}
