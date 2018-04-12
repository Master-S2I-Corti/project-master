

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Enseignant', function (Blueprint $table) {
            $table->integer('code_professeur');
            $table->string('type', 25);
            $table->integer('heure');
            $table->string('batiment', 25);
            $table->string('etage', 25);
            $table->string('numero_privee', 10);
            $table->integer('id');
            $table->integer('id_status');
            $table->integer('id_departement');
            $table->timestamps();
            $table->index(["id"]);
            $table->index(["id_status"]);
            $table->index(["id_departement"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Enseignant');
    }
}

