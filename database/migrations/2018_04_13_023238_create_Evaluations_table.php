

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evaluations', function (Blueprint $table) {
            $table->integer('id_evaluation');
            $table->integer('coeff');
            $table->string('type', 25);
            $table->string('libelle', 50);
            $table->date('dateEval');
            $table->integer('code_professeur');
            $table->integer('id_matiere');
            $table->timestamps();
            $table->index(["code_professeur"]);
            $table->index(["id_matiere"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Evaluations');
    }
}

