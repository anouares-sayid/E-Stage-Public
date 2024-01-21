<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantStagePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_stage', function (Blueprint $table) {
            $table->unsignedBigInteger('etudiant_id')->index();
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
            $table->unsignedBigInteger('stage_id')->index();
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->primary(['etudiant_id', 'stage_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiant_stage');
    }
}
