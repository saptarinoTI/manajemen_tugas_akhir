<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendadaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendadaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id')->unique()->nullable()->references('id')->on('proposal')->onDelete('cascade');
            $table->string('mahasiswa_nim')->unique()->nullable()->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->string('krs');
            $table->string('transkip_nilai');
            $table->string('konsultasi');
            $table->string('perkuliahan');
            $table->string('keuangan');
            $table->string('perpustakaan');
            $table->string('laboratorium');
            $table->string('action');
            $table->string('kompetensi');
            $table->string('toefl');
            $table->string('ijazah');
            $table->string('ktp');
            $table->string('akte');
            $table->string('foto');
            $table->enum('status', ['dikirim', 'diproses', 'diterima', 'ditolak'])->default('dikirim');
            $table->date('tgl_terima')->nullable();
            $table->text('keterangan');
            $table->timestamps();

            // $table->foreign('proposal_id')->references('id')->on('proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendadaran');
    }
}
