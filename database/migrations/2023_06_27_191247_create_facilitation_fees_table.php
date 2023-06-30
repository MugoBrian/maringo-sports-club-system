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
        Schema::create('facilitation_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sports_event_id');
            $table->unsignedBigInteger('member_id');
            $table->decimal('fee', 8, 2)->default(500.00);
            $table->timestamps();

            $table->foreign('sports_event_id')->references('id')->on('sports_events');
            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilitation_fees');
    }
};
