<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Policedetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('police', function (Blueprint $table) {

                    $table->string('srjno');
                    $table->string('policefullname');
                    $table->string('policetag');
                    $table->string('policearea');
                    $table->string('policerank');
                    $table->string('policephoneno');
                    $table->string('policescenephoto');
                    $table->string('policefoldername');
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
    Schema::dropIfExists('police');
    }
}
