<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstDiplomeHorsUnivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Est_diplome_hors_univ', function (Blueprint $table) {
            $table->Integer('code_etudiant');
            $table->foreign('code_etudiant')->references('code_etudiant')->on('etudiant');
            $table->string('libelle');
            $table->Integer('obtention');
            $table->primary('code_etudiant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('est_diplome_hors_univ');
    }
}
