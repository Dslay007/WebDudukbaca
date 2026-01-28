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
        Schema::table('member', function (Blueprint $table) {
            if (!Schema::hasColumn('member', 'nik')) {
                $table->string('nik', 20)->nullable()->after('member_name');
            }
            if (!Schema::hasColumn('member', 'member_phone')) {
                $table->string('member_phone', 20)->nullable()->after('nik');
            }
            if (!Schema::hasColumn('member', 'member_address')) {
                $table->text('member_address')->nullable()->after('member_phone');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member', function (Blueprint $table) {
            $table->dropColumn(['nik', 'member_phone', 'member_address']);
        });
    }
};
