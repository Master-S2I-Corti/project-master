

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UE', function (Blueprint $table) {
            $table->string('id_ue', 25);
            $table->string('libelle', 25);
            $table->text('description');
            $table->integer('coeff');
            $table->integer('ects');
            $table->string('id_semestre', 25);
            $table->timestamps();
            $table->index(["id_semestre"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UE');
    }
}

