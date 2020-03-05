<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->string('srjno');
            $table->string('gactnumber');
            $table->string('gaanalysis');
            $table->string('gadate');
            $table->string('gatime');
            $table->string('mrirefnum');          
            $table->string('mrianalysis');
            $table->string('mridate');
            $table->string('mritime');            
            $table->string('otherrefnum');            
            $table->string('otheranalysis');
            $table->string('otherdate');
            $table->string('othertime');
            $table->timestamps();   
            $table->foreign('gactnumber')->references('ctnumber')->on('ga');
            $table->foreign('mrirefnum')->references('refnumber')->on('mri');
            $table->foreign('otherrefnum')->references('refnumber')->on('other');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samples');
    }
}
