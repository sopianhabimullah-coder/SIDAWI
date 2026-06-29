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
        Schema::table('keluargas', function (Blueprint $table) {
        $table->integer('tiga_buta')->default(0);
        $table->integer('berkebutuhan_khusus')->default(0);

        $table->boolean('tidak_layak_huni')->default(false);

        $table->integer('dll_air')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluargas', function (Blueprint $table) {
            //
        });
    }
};
