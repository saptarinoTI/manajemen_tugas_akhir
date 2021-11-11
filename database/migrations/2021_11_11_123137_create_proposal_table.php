<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_nim')->unique()->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->string('file1');
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            $table->date('tgl_terima')->nullable();
            $table->enum('status', ['terima', 'tolak', 'validasi'])->default('terima');
            $table->text('keterangan');
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
        Schema::dropIfExists('proposal');
    }
}
