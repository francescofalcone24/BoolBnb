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
        Schema::disableForeignKeyConstraints();

        Schema::create('visuals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suite_id')->cascadeOnDelete()->constrained();
            $table->foreign('suite_id')->references('id')->on('suites')->cascadeOnDelete();
            $table->string('ip_address');
            $table->dateTime('date');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visuals');
    }
};
