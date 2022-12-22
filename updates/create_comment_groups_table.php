<?php

declare(strict_types=1);

namespace Dimsog\Comments\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateCommentGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('dimsog_comments_groups', static function (Blueprint $table): void {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimsog_comments_groups');
    }
}
