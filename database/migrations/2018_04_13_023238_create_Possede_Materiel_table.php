

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePossedeMaterielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Possede_Materiel', function (Blueprint $table) {
            $table->integer('id_salle');
            $table->integer('id_materiel');
            $table->timestamps();
            $table->index(["id_materiel"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Possede_Materiel');
    }
}

