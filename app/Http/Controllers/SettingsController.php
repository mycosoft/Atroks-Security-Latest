<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    public function index()
    {
        // Get all settings grouped
        $generalSettings = Settings::getByGroup('general');
        $smtpSettings = Settings::getByGroup('smtp');

        // Get current .env SMTP values as fallback
        $envSmtp = [
            'mail_mailer' => env('MAIL_MAILER', 'smtp'),
            'mail_host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'mail_port' => env('MAIL_PORT', '465'),
            'mail_username' => env('MAIL_USERNAME', ''),
            'mail_password' => env('MAIL_PASSWORD', ''),
            'mail_encryption' => env('MAIL_ENCRYPTION', 'ssl'),
            'mail_from_address' => env('MAIL_FROM_ADDRESS', ''),
            'mail_from_name' => env('MAIL_FROM_NAME', 'ATROKS SECURITY SERVICES LIMITED'),
        ];

        // Merge database settings with env fallbacks
        $smtpSettings = array_merge($envSmtp, $smtpSettings);

        return view('settings.index', compact('generalSettings', 'smtpSettings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'mail_mailer' => 'required|string|in:smtp,sendmail,mailgun,ses,postmark,log,array',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|integer|min:1|max:65535',
            'mail_username' => 'required|string|email|max:255',
            'mail_password' => 'required|string|min:1',
            'mail_encryption' => 'required|string|in:ssl,tls',
            'mail_from_address' => 'required|string|email|max:255',
            'mail_from_name' => 'required|string|max:255',
        ]);

        // Update general settings
        Settings::set('company_name', $validated['company_name'], 'general', 'Company name displayed throughout the system');

        // Update SMTP settings
        $smtpFields = [
            'mail_mailer',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name',
        ];

        foreach ($smtpFields as $field) {
            Settings::set($field, $validated[$field], 'smtp', 'SMTP configuration');
        }

        // Optionally update .env file (commented out for safety)
        // $this->updateEnvFile($validated);

        // Clear config cache to apply new settings
        Artisan::call('config:clear');

        return back()->with('success', 'Settings updated successfully. SMTP configuration saved.');
    }

    public function testSmtp(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        try {
            // Get current SMTP settings from database
            $smtpSettings = Settings::getByGroup('smtp');
            
            // Use .env values as fallback, and filter out empty database values
            $mailHost = !empty($smtpSettings['mail_host']) ? $smtpSettings['mail_host'] : env('MAIL_HOST');
            $mailPort = !empty($smtpSettings['mail_port']) ? $smtpSettings['mail_port'] : env('MAIL_PORT');
            $mailUsername = !empty($smtpSettings['mail_username']) ? $smtpSettings['mail_username'] : env('MAIL_USERNAME');
            $mailPassword = !empty($smtpSettings['mail_password']) ? $smtpSettings['mail_password'] : env('MAIL_PASSWORD');
            $mailEncryption = !empty($smtpSettings['mail_encryption']) ? $smtpSettings['mail_encryption'] : env('MAIL_ENCRYPTION');
            $mailFromAddress = !empty($smtpSettings['mail_from_address']) ? $smtpSettings['mail_from_address'] : env('MAIL_FROM_ADDRESS');
            $mailFromName = !empty($smtpSettings['mail_from_name']) ? $smtpSettings['mail_from_name'] : env('MAIL_FROM_NAME', 'ATROKS Security Services');

            // Validate that we have a from address
            if (empty($mailFromAddress)) {
                return back()->with('error', 'MAIL_FROM_ADDRESS is not configured. Please update your settings or .env file.');
            }

            // Temporarily update mail config
            Config::set('mail.default', 'smtp');
            Config::set('mail.mailers.smtp.transport', 'smtp');
            Config::set('mail.mailers.smtp.host', $mailHost);
            Config::set('mail.mailers.smtp.port', $mailPort);
            Config::set('mail.mailers.smtp.encryption', $mailEncryption);
            Config::set('mail.mailers.smtp.username', $mailUsername);
            Config::set('mail.mailers.smtp.password', $mailPassword);
            Config::set('mail.from.address', $mailFromAddress);
            Config::set('mail.from.name', $mailFromName);

            // Send test email
            Mail::raw('This is a test email from ATROKS Security Services system. If you received this, your SMTP configuration is working correctly!', function (Message $message) use ($request) {
                $message->to($request->test_email)
                    ->subject('ATROKS Security Services - SMTP Test');
            });

            return back()->with('success', 'Test email sent successfully to '.$request->test_email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send test email: '.$e->getMessage());
        }
    }

    /**
     * Update .env file with new settings (optional - use with caution)
     */
    private function updateEnvFile(array $settings)
    {
        $envPath = base_path('.env');

        if (! file_exists($envPath)) {
            return false;
        }

        $envContent = file_get_contents($envPath);

        // Map setting keys to .env keys
        $envMappings = [
            'mail_mailer' => 'MAIL_MAILER',
            'mail_host' => 'MAIL_HOST',
            'mail_port' => 'MAIL_PORT',
            'mail_username' => 'MAIL_USERNAME',
            'mail_password' => 'MAIL_PASSWORD',
            'mail_encryption' => 'MAIL_ENCRYPTION',
            'mail_from_address' => 'MAIL_FROM_ADDRESS',
            'mail_from_name' => 'MAIL_FROM_NAME',
        ];

        foreach ($envMappings as $settingKey => $envKey) {
            if (isset($settings[$settingKey])) {
                $pattern = "/^{$envKey}=.*/m";
                $replacement = "{$envKey}={$settings[$settingKey]}";

                if (preg_match($pattern, $envContent)) {
                    $envContent = preg_replace($pattern, $replacement, $envContent);
                } else {
                    $envContent .= "\n{$replacement}";
                }
            }
        }

        file_put_contents($envPath, $envContent);

        return true;
    }
}
