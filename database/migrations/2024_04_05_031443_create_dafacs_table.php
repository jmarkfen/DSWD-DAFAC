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
        Schema::create('dafacs', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number');
            // head of the family
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('name_extension');
            $table->string('birthdate');
            $table->string('sex');
            $table->string('mother_maiden_name');
            $table->string('monthly_family_net_income');
            $table->string('id_card_number');
            $table->string('contact_number');
            $table->string('permanent_address');
            $table->string('is_4ps_beneficiary');
            $table->string('is_ip');
            $table->string('older_persons_count');
            $table->string('pregnant_and_lactating_mothers_count');
            $table->string('pwd_and_with_medical_conditions_count');
            $table->string('house_ownership');
            $table->string('housing_condition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dafacs');
    }
};
