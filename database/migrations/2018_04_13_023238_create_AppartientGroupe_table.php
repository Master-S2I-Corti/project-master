

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppartientGroupeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AppartientGroupe', function (Blueprint $table) {
            $table->integer('code_groupe');
            $table->integer('code_etudiant');
            $table->timestamps();
            $table->index(["code_etudiant"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AppartientGroupe');
    }
}

