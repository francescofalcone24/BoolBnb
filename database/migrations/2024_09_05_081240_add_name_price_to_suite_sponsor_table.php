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
        Schema::table('suite_sponsor', function (Blueprint $table) {
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_price')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suite_sponsor', function (Blueprint $table) {
            //
        });
    }
};
