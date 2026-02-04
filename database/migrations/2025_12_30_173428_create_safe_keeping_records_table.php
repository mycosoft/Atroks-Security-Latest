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
        Schema::create('safe_keeping_records', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique();
            $table->string('client_name');
            $table->text('client_address')->nullable();
            $table->string('shipper_name')->nullable();
            $table->text('item_description');
            $table->string('weight');
            $table->date('stored_at');
            $table->string('qr_code_path')->nullable();
            $table->string('status')->default('Stored');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safe_keeping_records');
    }
};
