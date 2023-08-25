<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employID')->constrained('employes')->onUpdate('cascade')->onDelete('cascade')->default(null);
            $table->string('droitConge')->default(null);
            $table->string('duree')->default(null);
            $table->string('dataDepart')->default(null);
            // $table->foreignId('divisionID')->constrained('devisions')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('serviceID')->constrained('services')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('conges');
    }
}
