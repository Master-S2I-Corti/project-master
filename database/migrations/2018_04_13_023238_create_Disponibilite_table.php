

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibiliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Disponibilite', function (Blueprint $table) {
            $table->integer('id_dispo');
            $table->string('libelle', 25);
            $table->integer('jour_semaine');
            $table->string('m1', 25);
            $table->string('m2', 25);
            $table->string('m3', 25);
            $table->string('m4', 25);
            $table->string('m5', 25);
            $table->integer('code_professeur');
            $table->timestamps();
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
        Schema::dropIfExists('Disponibilite');
    }
}

