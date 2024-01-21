<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->double('note')->nullable();
            $table->string('sujet');
            $table->boolean('is_valid')->default(false);
            $table->string('encadrant_prof_prenom');
            $table->string('encadrant_prof_nom');
            $table->string('encadrant_prof_tel')->nullable();
            $table->string('encadrant_prof_email')->nullable();
            $table->longText('description');
            $table->foreignId('encadrant_id')->nullable()->constrained('professeurs','id')->onDelete('cascade');
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('stages');
    }
}
