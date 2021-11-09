<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_nim')->unique();
            $table->string('krs');
            $table->string('transkip_nilai');
            $table->string('laporan_kp');
            $table->string('keuangan');
            $table->string('konsultasi');
            $table->enum('status', ['terima', 'tolak', 'pending'])->default('pending');
            $table->date('tgl_terima')->nullable();
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seminar');
    }
}
