<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CreateDocFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('doc_files', function (Blueprint $table) {
            $table->id();
            //columns
            $table->string('type', 255)->nullable();
            $table->longText('path');
            //foreign key
            $table->foreignId('attestation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('presentation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('rapport_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('fiche_evaluation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('doc_files');
    }
}
