<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->enum('jenis', ['kiloan', 'selimut', 'bed_cover','kaos', 'lain-lain']);
            $table->string('nama_paket');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_outlet')->references('id')->on('outlet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packets');
    }
}
