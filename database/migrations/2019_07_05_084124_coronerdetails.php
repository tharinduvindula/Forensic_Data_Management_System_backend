<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coronerdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('coroner', function (Blueprint $table) {

                        $table->string('srjno');
                        $table->string('coronerfullname');
                        $table->string('coronerarea');
                        $table->string('coronerordergivenby');
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
    Schema::dropIfExists('coroner');
    }
}
