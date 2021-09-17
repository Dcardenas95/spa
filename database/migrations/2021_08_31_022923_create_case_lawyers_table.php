<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_lawyers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caso_id');
            $table->unsignedBigInteger('lawyer_id');

            $table->foreign('caso_id')->references('id')->on('customers');
            $table->foreign('lawyer_id')->references('id')->on('lawyers');
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
        Schema::dropIfExists('case_lawyers');
    }
}
