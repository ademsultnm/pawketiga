<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {

            // apapun yang diubah dibawah ini, harus PHP ARTISAN MIGRATE
            // TAMBAHKAN INCREMENT untuk membaca update data id sesuai urutan
            $table->increments('id');

            $table->String('nama'); // buat 4 kolom tabel
            $table->Integer('nbi');
            $table->String('praktikum');
            $table->Integer('sesi');

            // timestamp ini riwayat kapan kita bikin kolom
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
