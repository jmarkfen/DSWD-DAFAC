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
        Schema::create('id_card_types', function (Blueprint $table) {
            $table->id();
            $table->string('id_card_type');
            $table->timestamps();
        });

        Schema::table('families', function (Blueprint $table) {
            $table->foreignId('head_id_card_type_id')->nullable()->constrained();
            $table->string('head_id_card_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_card_types');
    }
};
