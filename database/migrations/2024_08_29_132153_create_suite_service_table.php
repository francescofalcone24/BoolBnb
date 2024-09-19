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

        Schema::create('suite_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suite_id')->constrained()->nullable();
            $table->foreign('suite_id')->references('id')->on('suites')->cascadeOnDelete();
            $table->unsignedBigInteger('service_id')->constrained();
            $table->foreign('service_id')->references('id')->on('services')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suite_service');
    }
};
