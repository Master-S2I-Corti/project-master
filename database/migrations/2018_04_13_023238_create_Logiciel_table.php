

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogicielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Logiciel', function (Blueprint $table) {
            $table->integer('id_logiciel');
            $table->string('libelle', 255);
            $table->date('licence');
            $table->text('personne_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Logiciel');
    }
}

