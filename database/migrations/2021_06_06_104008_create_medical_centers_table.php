<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_centers', function (Blueprint $table) {
            $table->id();
            if (Schema::hasTable('users')) {
                $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            if (Schema::hasTable('locations')) {
                $table->foreignId('location_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            $table->string('name');
            $table->double('lat');
            $table->double('lng');
            $table->string('phone_number');
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
        Schema::dropIfExists('medical_centers');
    }
}
