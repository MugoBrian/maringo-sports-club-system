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
        Schema::create('surchaged_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lost_item_id');
            $table->unsignedBigInteger('member_id');
            $table->decimal('amount', 8, 2);
            
            $table->foreign('lost_item_id')->references('id')->on('lost_items')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surchaged_fees');
    }
};
