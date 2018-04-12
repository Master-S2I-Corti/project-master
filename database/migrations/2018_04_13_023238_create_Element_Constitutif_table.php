

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementConstitutifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Element_Constitutif', function (Blueprint $table) {
            $table->integer('id_matiere');
            $table->string('libelle', 50);
            $table->string('description', 25);
            $table->text('plan');
            $table->integer('coeff');
            $table->double('cours');
            $table->double('tp');
            $table->double('td');
            $table->string('id_ue', 25);
            $table->timestamps();
            $table->index(["id_ue"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Element_Constitutif');
    }
}

