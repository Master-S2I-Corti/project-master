

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Etudiant', function (Blueprint $table) {
            $table->integer('code_etudiant');
            $table->string('INE', 25);
            $table->string('numSecu', 25);
            $table->integer('id_annee');
            $table->integer('id');
            $table->timestamps();
            $table->index(["id_annee"]);
            $table->index(["id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Etudiant');
    }
}

