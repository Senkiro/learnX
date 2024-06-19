<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(config('permission.table_names.roles'), function (Blueprint $table) {
            $table->string('description')->nullable()->after('guard_name');
            $table->softDeletes()->after('updated_at');
            $table->tinyInteger('publish')->default(1)->after('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('permission.table_names.roles'), function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropSoftDeletes();
            $table->dropColumn('publish');
        });
    }
};
