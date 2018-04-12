

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Personne', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 25);
            $table->string('password', 255);
            $table->string('nom', 25);
            $table->string('prenom', 25);
            $table->string('tel', 25);
            $table->date('naissance');
            $table->string('email', 50);
            $table->string('email_sos', 50);
            $table->string('code_postal', 25);
            $table->string('ville', 25);
            $table->string('adresse', 25);
            $table->string('remember_token', 100);
            $table->tinyInteger('admin');
            $table->integer('code_professeur');
            $table->integer('code_etudiant');
            $table->timestamps();
            $table->index(["code_professeur"]);
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
        Schema::dropIfExists('Personne');
    }
}

