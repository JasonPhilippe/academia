<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliberationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliberations', function (Blueprint $table) {
            $table->id();
            $table->string('id_promotion');
            $table->string('d_etudiant');
            $table->string('est_valide');
            $table->double('pourcentage');
            $table->string('a_subit_perequation');
            $table->string('session_delib');
            $table->string('nombre_echec_leger');
            $table->string('nombre_echec_grave');
            $table->string('decision');
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
        Schema::dropIfExists('deliberations');
    }
}
