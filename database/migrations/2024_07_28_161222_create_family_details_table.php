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
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('full_name');
            $table->string('address_line')->nullable();
            $table->string('veda', 25)->nullable();
            $table->string('category', 45)->nullable();
            $table->string('sub_category', 65)->nullable();
            $table->string('gothra', 25)->nullable();
            $table->string('area', 128)->nullable();
            $table->string('taluk', 35)->nullable();
            $table->string('profession', 45)->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('family_id', 15)->nullable();
            $table->index(['full_name', 'gothra', 'veda']);
            $table->index(['family_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
