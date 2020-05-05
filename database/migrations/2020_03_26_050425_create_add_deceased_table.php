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
            $table->date('policedate');
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
            $table->date('gadate');
            $table->time('gatime');
            $table->string('mrirefnum');
            $table->string('mrianalysis');
            $table->date('mridate');
            $table->time('mritime');
            $table->string('otherrefnum');
            $table->string('otheranalysis');
            $table->date('otherdate');
            $table->time('othertime');
            $table->foreign('gactnumber')->references('ctnumber')->on('ga');
            $table->foreign('mrirefnum')->references('refnumber')->on('mri');
            $table->foreign('otherrefnum')->references('refnumber')->on('other');
            $table->string('addingby');
            $table->string('lasteditby');
            $table->integer('active')->default(1);
            $table->timestamp('updated_at');
            $table->primary(array('srjno', 'updated_at'));
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
