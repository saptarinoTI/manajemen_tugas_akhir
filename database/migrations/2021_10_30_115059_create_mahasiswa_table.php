<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            // $table->id();
            $table->string('nim', 11)->unique()->primary();
            $table->string('nama', 100);
            $table->string('no_hp', 14);
            $table->string('tmpt_lahir', 20);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('pem_utama', 100);
            $table->string('pem_pendamping', 100);
            $table->text('judul_ta');
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
        Schema::dropIfExists('mahasiswa');
    }
}
