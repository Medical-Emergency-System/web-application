<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyStatusInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_status_instructions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->foreign('parent_id')
                ->references('id')->on('emergency_status_instructions')
                ->onDelete('cascade')
            ;
            if (Schema::hasTable('emergency_statuses')) {
                $table->foreignId('emergency_status_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            $table->longText('text');
            $table->longText('answer');
            $table->longText('question');
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
        Schema::dropIfExists('emergency_status_instructions');
    }
}
