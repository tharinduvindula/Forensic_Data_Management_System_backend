<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->string('srjno');
            $table->boolean('pmdate');
            $table->boolean('pmtime');
            $table->boolean('fullname');
            $table->boolean('age');
            $table->boolean('sex');
            $table->boolean('address');
            $table->boolean('contactnumber');
            $table->boolean('policefullname');
            $table->boolean('policetag');
            $table->boolean('policearea');
            $table->boolean('policerank');
            $table->boolean('policephoneno');
            $table->boolean('policedate');
            $table->boolean('policescenephoto');
            $table->boolean('policefoldername');
            $table->boolean('coronerfullname');
            $table->boolean('coronerarea');
            $table->boolean('coronerordergivenby');
            $table->boolean('a');
            $table->boolean('b');
            $table->boolean('c');
            $table->boolean('contributory_cause');
            $table->boolean('other_comments');
            $table->boolean('cod');
            $table->boolean('circumstances');
            $table->boolean('gactnumber');
            $table->boolean('gaanalysis');
            $table->boolean('gadate');
            $table->boolean('gatime');
            $table->boolean('mrirefnum');
            $table->boolean('mrianalysis');
            $table->boolean('mridate');
            $table->boolean('mritime');
            $table->boolean('otherrefnum');
            $table->boolean('otheranalysis');
            $table->boolean('otherdate');
            $table->boolean('othertime');
            $table->boolean('addingby');
            $table->boolean('lasteditby');
            $table->boolean('active')->default(1);
            $table->boolean('gablood');
            $table->boolean('galiver');
            $table->boolean('gasuspectedpoison');
            $table->boolean('gaurine');
            $table->boolean('gakidney');
            $table->boolean('gamedicine');
            $table->boolean('gabile');
            $table->boolean('galungs');
            $table->boolean('gaother');
            $table->boolean('gastomachcontents');
            $table->boolean('gavitreoushumor');
            $table->boolean('gaintestinalcontents');
            $table->boolean('gabrain');
            $table->boolean('mriblood');
            $table->boolean('mriliver');
            $table->boolean('mrisuspectedpoison');
            $table->boolean('mriurine');
            $table->boolean('mrikidney');
            $table->boolean('mrimedicine');
            $table->boolean('mribile');
            $table->boolean('mrilungs');
            $table->boolean('mriother');
            $table->boolean('mristomachcontents');
            $table->boolean('mrivitreoushumor');
            $table->boolean('mriintestinalcontents');
            $table->boolean('mribrain');
            $table->boolean('otherblood');
            $table->boolean('otherliver');
            $table->boolean('othersuspectedpoison');
            $table->boolean('otherurine');
            $table->boolean('otherkidney');
            $table->boolean('othermedicine');
            $table->boolean('otherbile');
            $table->boolean('otherlungs');
            $table->boolean('otherother');
            $table->boolean('otherstomachcontents');
            $table->boolean('othervitreoushumor');
            $table->boolean('otherintestinalcontents');
            $table->boolean('otherbrain');
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
        Schema::dropIfExists('history');
    }
}
