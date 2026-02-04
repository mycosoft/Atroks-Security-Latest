@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>System Settings</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">General Settings</h3>
                </div>
                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" 
                                   value="{{ old('company_name', $generalSettings['company_name'] ?? 'ATROKS SECURITY SERVICES LIMITED') }}" 
                                   required>
                            <small class="form-text text-muted">Company name displayed throughout the system</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save All Settings</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">SMTP Test</h3>
                </div>
                <form action="{{ route('settings.test-smtp') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="test_email">Test Email Address</label>
                            <input type="email" class="form-control" id="test_email" name="test_email" 
                                   placeholder="Enter email to test SMTP configuration" required>
                            <small class="form-text text-muted">Send a test email to verify SMTP settings</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-paper-plane"></i> Send Test Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">SMTP Configuration</h3>
        </div>
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mail_mailer">Mail Driver</label>
                            <select class="form-control" id="mail_mailer" name="mail_mailer" required>
                                <option value="smtp" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'smtp') ? 'selected' : '' }}>SMTP</option>
                                <option value="sendmail" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'sendmail') ? 'selected' : '' }}>Sendmail</option>
                                <option value="mailgun" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'mailgun') ? 'selected' : '' }}>Mailgun</option>
                                <option value="ses" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'ses') ? 'selected' : '' }}>Amazon SES</option>
                                <option value="postmark" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'postmark') ? 'selected' : '' }}>Postmark</option>
                                <option value="log" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'log') ? 'selected' : '' }}>Log</option>
                                <option value="array" {{ (old('mail_mailer', $smtpSettings['mail_mailer'] ?? '') == 'array') ? 'selected' : '' }}>Array</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="mail_host">SMTP Host</label>
                            <input type="text" class="form-control" id="mail_host" name="mail_host" 
                                   value="{{ old('mail_host', $smtpSettings['mail_host'] ?? 'smtp.gmail.com') }}" required>
                            <small class="form-text text-muted">e.g., smtp.gmail.com, smtp.mail.yahoo.com</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="mail_port">SMTP Port</label>
                            <input type="number" class="form-control" id="mail_port" name="mail_port" 
                                   value="{{ old('mail_port', $smtpSettings['mail_port'] ?? '465') }}" required>
                            <small class="form-text text-muted">Common ports: 465 (SSL), 587 (TLS), 25</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="mail_encryption">Encryption</label>
                            <select class="form-control" id="mail_encryption" name="mail_encryption" required>
                                <option value="ssl" {{ (old('mail_encryption', $smtpSettings['mail_encryption'] ?? '') == 'ssl') ? 'selected' : '' }}>SSL</option>
                                <option value="tls" {{ (old('mail_encryption', $smtpSettings['mail_encryption'] ?? '') == 'tls') ? 'selected' : '' }}>TLS</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mail_username">SMTP Username/Email</label>
                            <input type="email" class="form-control" id="mail_username" name="mail_username" 
                                   value="{{ old('mail_username', $smtpSettings['mail_username'] ?? '') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="mail_password">SMTP Password</label>
                            <input type="password" class="form-control" id="mail_password" name="mail_password" 
                                   value="{{ old('mail_password', $smtpSettings['mail_password'] ?? '') }}" required>
                            <small class="form-text text-muted">For Gmail, use App Password if 2FA is enabled</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="mail_from_address">From Email Address</label>
                            <input type="email" class="form-control" id="mail_from_address" name="mail_from_address" 
                                   value="{{ old('mail_from_address', $smtpSettings['mail_from_address'] ?? '') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="mail_from_name">From Name</label>
                            <input type="text" class="form-control" id="mail_from_name" name="mail_from_name" 
                                   value="{{ old('mail_from_name', $smtpSettings['mail_from_name'] ?? 'ATROKS SECURITY SERVICES LIMITED') }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-info">
                    <h5><i class="icon fas fa-info-circle"></i> Note</h5>
                    <p>SMTP settings are saved to the database. Current .env values are used as fallback if database values are not set.</p>
                    <p class="mb-0"><strong>Current .env values:</strong> MAIL_HOST={{ env('MAIL_HOST', 'Not set') }}, MAIL_USERNAME={{ env('MAIL_USERNAME', 'Not set') }}</p>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save All Settings</button>
                <a href="{{ route('settings.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('#togglePassword').click(function() {
                const passwordField = $('#mail_password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
            
            // Auto-populate from address if username is an email
            $('#mail_username').on('blur', function() {
                const username = $(this).val();
                const fromAddress = $('#mail_from_address');
                
                if (username.includes('@') && fromAddress.val() === '') {
                    fromAddress.val(username);
                }
            });
        });
    </script>
@stop
