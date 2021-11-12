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
            $table->bigInteger('proposal_id')->unique()->nullable()->references('id')->on('proposal')->onDelete('cascade');
            $table->string('mahasiswa_nim')->unique()->nullable()->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->string('krs');
            $table->string('transkip_nilai');
            $table->string('laporan_kp');
            $table->string('keuangan');
            $table->string('konsultasi');
            $table->enum('status', ['dikirim', 'diproses', 'diterima', 'ditolak'])->default('dikirim');
            $table->date('tgl_terima')->nullable();
            $table->text('keterangan');
            $table->timestamps();

            // $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            // $table->foreignId('proposal_id')->references('id')->on('proposal')->onDelete('cascade');
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
