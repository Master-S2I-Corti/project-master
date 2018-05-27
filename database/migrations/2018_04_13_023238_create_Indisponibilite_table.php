

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndisponibiliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Indisponibilite', function (Blueprint $table) {
            $table->integer('id_indispo');
            $table->timestamp('debut')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fin')->default('0000-00-00 00:00:00');
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
        Schema::dropIfExists('Indisponibilite');
    }
}

