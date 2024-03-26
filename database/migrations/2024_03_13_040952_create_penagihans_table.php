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
        Schema::create('penagihans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('bast_id');
            $table->foreign('bast_id')->references('id')->on('basts')->onDelete('restrict');

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
        Schema::dropIfExists('penagihans');
    }
};
