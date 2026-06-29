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
        $table->boolean('pdam')->default(false)->change();
        $table->boolean('sumur')->default(false)->change();
        $table->boolean('dll_air')->default(false)->change();
        $table->boolean('beras')->default(false)->change();
        $table->boolean('non_beras')->default(false)->change();
        $table->boolean('up2k')->default(false)->change();
        $table->boolean('pekarangan')->default(false)->change();
        $table->boolean('industri_rumah_tangga')->default(false)->change();
        $table->boolean('kerja_bakti')->default(false)->change();
    });
}

public function down(): void
{
    Schema::table('keluargas', function (Blueprint $table) {
        $table->integer('pdam')->default(0)->change();
        $table->integer('sumur')->default(0)->change();
        $table->integer('dll_air')->default(0)->change();
        $table->integer('beras')->default(0)->change();
        $table->integer('non_beras')->default(0)->change();
        $table->integer('up2k')->default(0)->change();
        $table->integer('pekarangan')->default(0)->change();
        $table->integer('industri_rumah_tangga')->default(0)->change();
        $table->integer('kerja_bakti')->default(0)->change();
    });
}
};
