<?php

declare(strict_types=1);

namespace Dimsog\Comments\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateCommentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('dimsog_comments', static function (Blueprint $table): void {
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

    public function down(): void
    {
        Schema::dropIfExists('dimsog_comments');
    }
}
