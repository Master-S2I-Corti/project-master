

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Seance', function (Blueprint $table) {
            $table->integer('id_seance');
            $table->string('type', 25);
            $table->datetime('heure_debut');
            $table->datetime('heure_fin');
            $table->date('date_seance');
            $table->text('remarque');
            $table->integer('id_matiere');
            $table->integer('id_salle');
            $table->integer('code_professeur');
            $table->timestamps();
            $table->index(["id_matiere"]);
            $table->index(["id_salle"]);
            $table->index(["code_professeur"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Seance');
    }
}

