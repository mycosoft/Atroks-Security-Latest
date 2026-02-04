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
            $table->dropColumn(['client_name', 'client_address', 'phone_number', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('safe_keeping_records', function (Blueprint $table) {
            $table->string('client_name')->after('client_id');
            $table->text('client_address')->after('client_name');
            $table->string('phone_number')->nullable()->after('client_address');
            $table->string('email')->nullable()->after('phone_number');
        });
    }
};
