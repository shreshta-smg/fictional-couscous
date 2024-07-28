<?php

use App\Models\FamilyDetail;
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
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string("member_name", 65);
            $table->string('related_as', 25)->nullable();
            $table->string('is_married', 15)->nullable();
            $table->integer('age')->default(0);
            $table->string('education_profession', 144);
            $table->string('email_address')->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->foreignIdFor(FamilyDetail::class)->nullable();
            $table->index(['age', 'related_as']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_details');
    }
};
