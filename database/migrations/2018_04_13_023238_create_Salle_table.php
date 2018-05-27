

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Salle', function (Blueprint $table) {
            $table->integer('id_salle');
            $table->string('location', 25);
            $table->integer('capacite');
            $table->string('type', 255);
            $table->integer('num_salle');
            $table->integer('num_machine');
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
        Schema::dropIfExists('Salle');
    }
}

