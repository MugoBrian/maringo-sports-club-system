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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('age_category_id');
            $table->unsignedBigInteger('membership_type_id');
            $table->foreign('age_category_id')->references('id')->on('age_categories')->onDelete('set null');
            $table->foreign('membership_type_id')->references('id')->on('membership_types')->onDelete('set null');
            $table->string('fullname');
            $table->string('gender');
            $table->string('nextofkin');
            $table->date('dob');
            $table->string('contact');
            $table->string('subcounty');
            $table->string('school');
            $table->integer('weight');
            $table->integer('height');
            $table->string('specialneeds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
