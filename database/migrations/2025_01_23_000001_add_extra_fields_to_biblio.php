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
        Schema::table('biblio', function (Blueprint $table) {
            if (!Schema::hasColumn('biblio', 'edition')) {
                $table->string('edition', 50)->nullable();
            }
            if (!Schema::hasColumn('biblio', 'call_number')) {
                $table->string('call_number', 50)->nullable();
            }
            if (!Schema::hasColumn('biblio', 'classification')) {
                $table->string('classification', 50)->nullable();
            }
            if (!Schema::hasColumn('biblio', 'series_title')) {
                $table->string('series_title')->nullable();
            }
            if (!Schema::hasColumn('biblio', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('biblio', 'publish_place_id')) {
                $table->integer('publish_place_id')->nullable();
            }
            if (!Schema::hasColumn('biblio', 'language')) {
                $table->string('language', 20)->nullable();
            }
            if (!Schema::hasColumn('biblio', 'notes')) {
                $table->text('notes')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biblio', function (Blueprint $table) {
            $table->dropColumn([
                'edition', 
                'call_number', 
                'classification', 
                'series_title', 
                'image', 
                'publish_place_id', 
                'language', 
                'notes'
            ]);
        });
    }
};
