<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_indicators', function (Blueprint $table) {
            $table->id();
            if (Schema::hasTable('patients')) {
                $table->foreignId('patient_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            $table->time('time');
            $table->string('pulse');
            $table->string('oxygenation');
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
        Schema::dropIfExists('vital_indicators');
    }
}
