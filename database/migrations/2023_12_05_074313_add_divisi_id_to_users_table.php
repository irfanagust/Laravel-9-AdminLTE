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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('restrict')->onUpdate('cascade');
            
            $table->unsignedBigInteger('harbour_id')->nullable();
            $table->foreign('harbour_id')->references('id')->on('harbours')->onDelete('restrict')->onUpdate('cascade');

            $table->unsignedBigInteger('jabatan')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
