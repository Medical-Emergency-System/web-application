<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            if (Schema::hasTable('patients')) {
                $table->foreignId('patient_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            if (Schema::hasTable('emergency_status_instructions')) {
                $table->foreignId('emergency_status_instruction_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            $table->time('time');
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
        Schema::dropIfExists('records');
    }
}
