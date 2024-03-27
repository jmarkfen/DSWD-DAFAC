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
        Schema::create('ip_ethnicities', function (Blueprint $table) {
            $table->id();
            $table->string('ip_ethnicity');
            $table->timestamps();
        });

        Schema::table('families', function (Blueprint $table){
            $table->foreignId('head_ip_ethnicity_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_ethnicities');
    }
};
