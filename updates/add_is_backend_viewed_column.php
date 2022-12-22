<?php

declare(strict_types=1);

namespace Dimsog\Comments\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class AddIsBackendViewedColumn extends Migration
{
    public function up(): void
    {
        Schema::table('dimsog_comments', static function (Blueprint $table): void {
            $table->unsignedTinyInteger('is_backend_viewed')->default(0);
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('dimsog_comments', 'is_backend_viewed')) {
            Schema::table('dimsog_comments', static function (Blueprint $table) {
                $table->dropColumn('is_backend_viewed');
            });
        }
        Schema::dropIfExists('dimsog_comments');
    }
}
