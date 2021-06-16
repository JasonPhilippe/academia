<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_et');
            $table->string('nom_et');
            $table->string('postnom_et');
            $table->string('prenom_et');
            $table->string('sexe_et');
            $table->string('id_promotion');
            $table->string('image_et');
            $table->string('id_universite');
            $table->string('id_facultes');
            $table->string('id_dep');
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
        Schema::dropIfExists('students');
    }
}
