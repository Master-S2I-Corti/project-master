

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealiseMatiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Realise_Matiere', function (Blueprint $table) {
            $table->integer('id_matiere');
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
        Schema::dropIfExists('Realise_Matiere');
    }
}

