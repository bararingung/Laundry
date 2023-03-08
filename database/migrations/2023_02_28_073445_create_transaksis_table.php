<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->string('kode_invoice');
            $table->unsignedBigInteger('id_member');
            $table->unsignedBigInteger('id_packets');
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->date('tgl_bayar');
            $table->integer('biaya_tambahan');
            $table->double('diskon');
            $table->integer('pajak');
            $table->enum('status',['baru','proses','selesai','diambil']);
            $table->enum('status_bayar',['dibayar','belum_dibayar']);
            $table->timestamps();

            $table->foreign('id_outlet')->references('id')->on('outlet')->onDelete('cascade');
            $table->foreign('id_member')->references('id')->on('member')->onDelete('cascade');
            $table->foreign('id_packets')->references('id')->on('packets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
