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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('evacuation_site')->nullable();
            $table->string('head_last_name')->nullable();
            $table->string('head_first_name')->nullable();
            $table->string('head_name_extension')->nullable();
            $table->string('head_birthdate')->nullable();
            $table->string('head_birthplace')->nullable();
            $table->string('head_sex')->nullable();
            $table->string('head_mother_maiden_name')->nullable();
            $table->string('head_occupation')->nullable();
            $table->string('head_monthly_family_net_income')->nullable();
            $table->string('head_id_type')->nullable();
            $table->string('head_id_number')->nullable();
            $table->string('head_primary_contact_number')->nullable();
            $table->string('head_alternate_contact_number')->nullable();
            $table->string('head_permanent_address')->nullable();
            $table->boolean('head_is_4ps_beneficiary')->nullable();
            $table->string('head_ip_ethnicity')->nullable();
            $table->string('house_ownership_type')->nullable();
            $table->string('house_condition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
