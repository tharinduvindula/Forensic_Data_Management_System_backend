<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddDeceasedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_deceased', function (Blueprint $table) {
            $table->string('srjno');
            $table->date('pmdate');
            $table->time('pmtime');
            $table->string('fullname');
            $table->string('age');
            $table->string('sex');
            $table->string('address');
            $table->string('contactnumber');            
            $table->string('policefullname');
            $table->string('policetag');
            $table->string('policearea');
            $table->string('policerank');
            $table->string('policephoneno');
            $table->string('policescenephoto');
            $table->string('policefoldername');            
            $table->string('coronerfullname');
            $table->string('coronerarea');
            $table->string('coronerordergivenby');            
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('contributory_cause');
            $table->string('other_comments');
            $table->string('cod');
            $table->string('circumstances');            
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
            $table->foreign('gactnumber')->references('ctnumber')->on('ga');
            $table->foreign('mrirefnum')->references('refnumber')->on('mri');
            $table->foreign('otherrefnum')->references('refnumber')->on('other');   
            $table->string('addingby');
            $table->string('lasteditby');            ;
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('add_deceased');
    }
}
