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
            $table->string('addingby');
            $table->string('lasteditby');
            $table->integer('active')->default(1);
            $table->timestamp('updated_at');
            $table->timestamp('created_at')->nullable();
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
