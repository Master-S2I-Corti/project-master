

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePossedeLogicielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Possede_Logiciel', function (Blueprint $table) {
            $table->integer('id_salle');
            $table->integer('id_logiciel');
            $table->timestamps();
            $table->index(["id_logiciel"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Possede_Logiciel');
    }
}

