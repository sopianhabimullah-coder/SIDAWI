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
    Schema::create('keluargas', function (Blueprint $table) {
        $table->id();

        $table->string('nama_kepala_keluarga');
        $table->integer('jumlah_kk');

        $table->integer('jml_laki')->default(0);
        $table->integer('jml_perempuan')->default(0);

        $table->integer('balita')->default(0);
        $table->integer('pus')->default(0);
        $table->integer('wus')->default(0);

        $table->integer('ibu_hamil')->default(0);
        $table->integer('ibu_menyusui')->default(0);

        $table->integer('lansia')->default(0);

        $table->boolean('sehat_layak_huni')->default(false);
        $table->boolean('tempat_sampah')->default(false);
        $table->boolean('spal')->default(false);
        $table->boolean('jamban')->default(false);
        $table->boolean('stiker_p4k')->default(false);

        $table->integer('pdam')->default(0);
        $table->integer('sumur')->default(0);

        $table->integer('beras')->default(0);
        $table->integer('non_beras')->default(0);

        $table->integer('up2k')->default(0);
        $table->integer('pekarangan')->default(0);
        $table->integer('industri_rumah_tangga')->default(0);
        $table->integer('kerja_bakti')->default(0);

        $table->text('keterangan')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
