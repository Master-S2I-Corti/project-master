

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Departement', function (Blueprint $table) {
            $table->integer('id_departement');
            $table->string('libelle', 255);
            $table->integer('id_ufr');
            $table->timestamps();
            $table->index(["id_ufr"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Departement');
    }
}

