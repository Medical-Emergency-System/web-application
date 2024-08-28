<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            if (Schema::hasTable('users')) {
                $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            $table->string('address');
            $table->date('birthday');
            $table->string('work');
            $table->integer('length');
            $table->integer('weight');
            $table->string('phone_number');
            $table->string('national_number');
            $table->string('blood_type');
            $table->enum('gender', ['male', 'female']);
            $table->double('bmi');
            $table->boolean('smoked');
            $table->boolean('alcoholic');
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
        Schema::dropIfExists('patients');
    }
}
