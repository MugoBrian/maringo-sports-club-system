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
        Schema::create('patron_commissions', function (Blueprint $table) {
            $table->id();
            $table->decimal('commission_amount', 8, 2);
            $table->unsignedBigInteger('patron_id');
            $table->unsignedBigInteger('sports_event_id');
            $table->timestamps();

            $table->foreign('patron_id')->references('id')->on('patrons');
            $table->foreign('sports_event_id')->references('id')->on('sports_events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patron_commissions');
    }
};
