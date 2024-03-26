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
        Schema::create('spbjs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sp2bj_id');
            $table->foreign('sp2bj_id')->references('id')->on('sp2bj')->onDelete('restrict');

            $table->string('alasan');

            $table->string('file_url');

            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('spbjs');
    }
};
