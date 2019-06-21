<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanPembelianBarangsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_pembelian_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MULAI_TANGGAL');
            $table->string('SAMPAI_TANGGAL');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('laporan_pembelian_barangs');
    }
}
