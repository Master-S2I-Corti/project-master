<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstDiplomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Est_diplome', function (Blueprint $table) {
            $table->Integer('code_etudiant');
            $table->foreign('code_etudiant')->references('code_etudiant')->on('etudiant');
            $table->Integer('id_annee');
            $table->foreign('id_annee')->references('id_annee')->on('annee');
            $table->Integer('obtention');
            $table->primary(['code_etudiant','id_annee']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Est_diplome');
    }
}
