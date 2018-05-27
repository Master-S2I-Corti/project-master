

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Semestre', function (Blueprint $table) {
            $table->string('id_semestre', 25);
            $table->string('libelle', 25);
            $table->integer('id_annee');
            $table->timestamps();
            $table->index(["id_annee"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Semestre');
    }
}

