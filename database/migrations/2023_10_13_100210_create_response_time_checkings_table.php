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
        Schema::create('response_time_checkings', function (Blueprint $table) {
            $table->id();
            $table->integer('response_time');
            $table->date('date_checking_response_time');

            $table->unsignedBigInteger('ceklist_date_id');
            $table->foreign('ceklist_date_id')->references('id')->on('ceklist_dates')->onDelete('restrict');

            $table->unsignedBigInteger('list_tool_id');
            $table->foreign('list_tool_id')->references('id')->on('list_tools')->onDelete('restrict');

            $table->unsignedBigInteger('checking_process_tool_id');
            $table->foreign('checking_process_tool_id')->references('id')->on('checking_process_tools')->onDelete('restrict');

            $table->string('description')->nullable();

            $table->unsignedBigInteger('harbour_id');
            $table->foreign('harbour_id')->references('id')->on('harbours')->onDelete('restrict');
            
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
        Schema::dropIfExists('response_time_checkings');
    }
};
