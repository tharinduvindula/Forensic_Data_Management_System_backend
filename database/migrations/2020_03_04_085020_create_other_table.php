<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other', function (Blueprint $table) {
            $table->string('srjno');
            $table->string('refnumber');
            $table->integer('blood');
            $table->integer('liver');
            $table->integer('suspectedpoison');
            $table->integer('urine');
            $table->integer('kidney');
            $table->integer('medicine');
            $table->integer('bile');
            $table->integer('lungs');
            $table->integer('other');
            $table->integer('stomachcontents');
            $table->integer('vitreoushumor');
            $table->integer('intestinalcontents');
            $table->integer('brain');
            $table->timestamp('updated_at');
            $table->primary(array('refnumber', 'updated_at'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other');
    }
}
