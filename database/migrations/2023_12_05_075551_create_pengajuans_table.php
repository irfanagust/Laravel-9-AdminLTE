<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp2bj', function (Blueprint $table) {
            $table->id();
            $table->string('tentang');
            $table->date('tanggal');
            $table->unsignedBigInteger('status_pengajuan');

            $table->string('alasan');

            $table->string('file_url');

            $table->unsignedBigInteger('dikirim_untuk');
            $table->unsignedBigInteger('dibuat_oleh');
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
        Schema::dropIfExists('sp2bj');
    }
};
