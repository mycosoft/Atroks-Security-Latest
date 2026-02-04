<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            [
                'key' => 'company_name',
                'value' => 'ATROKS SECURITY SERVICES LIMITED',
                'group' => 'general',
                'description' => 'Company name displayed throughout the system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_mailer',
                'value' => 'smtp',
                'group' => 'smtp',
                'description' => 'Mail driver (smtp, sendmail, mailgun, etc.)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_host',
                'value' => 'smtp.gmail.com',
                'group' => 'smtp',
                'description' => 'SMTP server host',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_port',
                'value' => '465',
                'group' => 'smtp',
                'description' => 'SMTP server port',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_username',
                'value' => '',
                'group' => 'smtp',
                'description' => 'SMTP username/email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_password',
                'value' => '',
                'group' => 'smtp',
                'description' => 'SMTP password/app password',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_encryption',
                'value' => 'ssl',
                'group' => 'smtp',
                'description' => 'SMTP encryption (ssl, tls)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_from_address',
                'value' => '',
                'group' => 'smtp',
                'description' => 'Default from email address',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_from_name',
                'value' => 'ATROKS SECURITY SERVICES LIMITED',
                'group' => 'smtp',
                'description' => 'Default from name',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
