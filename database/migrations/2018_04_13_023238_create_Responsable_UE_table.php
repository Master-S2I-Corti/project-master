

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsableUETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Responsable_UE', function (Blueprint $table) {
            $table->string('id_ue', 25);
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
        Schema::dropIfExists('Responsable_UE');
    }
}

