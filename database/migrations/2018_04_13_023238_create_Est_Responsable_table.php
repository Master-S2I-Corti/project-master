

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Est_Responsable', function (Blueprint $table) {
            $table->integer('code_professeur');
            $table->integer('id_reponsabilite');
            $table->timestamps();
            $table->index(["id_reponsabilite"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Est_Responsable');
    }
}

