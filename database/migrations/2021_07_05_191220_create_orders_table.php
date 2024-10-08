<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            if (Schema::hasTable('patients')) {
                $table->foreignId('patient_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
            if (Schema::hasTable('medical_centers')) {
                $table->foreignId('medical_center_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
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
        Schema::dropIfExists('orders');
    }
}
