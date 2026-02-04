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
        Schema::create('status_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('safe_keeping_record_id')->constrained('safe_keeping_records')->onDelete('cascade');
            $table->string('status'); // Received, Stored, In Transit, Released, On Hold, etc.
            $table->text('description')->nullable(); // Short description of the status
            $table->text('notes')->nullable(); // Admin notes
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null'); // Admin who made the update
            $table->timestamps();
            
            // Index for faster queries
            $table->index('safe_keeping_record_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_updates');
    }
};
