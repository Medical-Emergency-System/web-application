<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambulances', function (Blueprint $table) {
            $table->id();
            if (Schema::hasTable('medical_centers')) {
                $table->foreignId('medical_center_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            $table->integer('number'); // number of ambulance in medical center 
            $table->string('plate_number');
            $table->boolean('status');
            $table->string('model'); // model car
            $table->string('ambulance_type');
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
        Schema::dropIfExists('ambulances');
    }
}
