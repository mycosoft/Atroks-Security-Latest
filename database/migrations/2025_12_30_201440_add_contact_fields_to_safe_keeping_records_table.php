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
        Schema::table('safe_keeping_records', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('client_address');
            $table->string('email')->nullable()->after('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('safe_keeping_records', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'email']);
        });
    }
};
