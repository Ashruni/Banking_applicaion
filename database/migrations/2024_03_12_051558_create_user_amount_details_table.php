<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_amount_details', function (Blueprint $table) {

            $table->id();
            $table->morphs('tokenable');
            $table->string('email')->nullable();
            $table->integer('deposit')->nullable();
            $table->integer('withdraw')->nullable();
            $table->integer('transfer')->nullable();
            $table->string('field')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            // $table->id();
            // $table->timestamps();
            // $table->deposit();
            // $table->withdraw();
            // $table->email();
            // $table->transfer();
            // $table->field();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_amount_details');
    }
};
