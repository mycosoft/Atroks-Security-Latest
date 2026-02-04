# Atroks Security Services

A comprehensive security services management system built with Laravel. This application provides a complete solution for managing security operations, client tracking, safe keeping records, and administrative functions.

## Features

### Core Modules
- **Client Management** - Manage client information and profiles
- **Tracking System** - Track security operations and incidents
- **Safe Keeping Records** - Secure management of valuables and documents
- **Payment Processing** - Handle payments and financial transactions
- **SMS Notifications** - Integrated SMS service with BulkSMS Uganda API
- **Email Notifications** - Configurable email system for client communications
- **Reporting** - Generate comprehensive reports in PDF and CSV formats

### Administrative Features
- User management and role-based access control
- System settings and configuration
- Payment account reports
- Membership application tracking
- Customizable email and SMS templates

## Technology Stack

- **Framework**: Laravel 10.x
- **Frontend**: Blade Templates, TailwindCSS
- **Database**: MySQL
- **Payment Gateway**: M-Pesa Integration
- **SMS Provider**: BulkSMS Uganda API
- **PDF Generation**: DomPDF

## Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7 or higher
- Node.js and NPM

### Setup Instructions

1. Clone the repository
```bash
git clone https://github.com/mycosoft/Atroks-Security-Latest.git
cd Atroks-Security-Latest
```

2. Install PHP dependencies
```bash
composer install
```

3. Install Node dependencies
```bash
npm install
```

4. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

5. Update `.env` file with your database credentials and API keys
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Email Configuration
MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# BulkSMS Uganda API
BULKSMS_UGANDA_API_URL=your_api_url
BULKSMS_UGANDA_API_KEY=your_api_key
BULKSMS_UGANDA_PASSWORD=your_password
```

6. Run database migrations
```bash
php artisan migrate
```

7. Seed the database (optional)
```bash
php artisan db:seed
```

8. Build frontend assets
```bash
npm run build
```

9. Start the development server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Configuration

### Email Settings
Configure email settings through the admin panel at `/settings/email` or directly in the `.env` file.

### SMS Settings
Configure SMS provider settings through the admin panel at `/settings/sms`. The system supports BulkSMS Uganda API integration.

### Payment Gateway
M-Pesa integration settings can be configured in the admin settings panel.

## Usage

### Default Admin Access
After installation, create an admin user:
```bash
php artisan make:admin
```

### Key Features Access
- **Dashboard**: `/dashboard`
- **Client Management**: `/clients`
- **Tracking**: `/tracking`
- **Safe Keeping**: `/safe-keeping`
- **Reports**: `/reports`
- **Settings**: `/settings`

## Development

### Running Tests
```bash
php artisan test
```

### Code Style
This project follows PSR-12 coding standards.

### Building Assets
For development:
```bash
npm run dev
```

For production:
```bash
npm run build
```

## Security

- All sensitive data is encrypted
- CSRF protection enabled
- SQL injection prevention through Eloquent ORM
- XSS protection through Blade templating
- Secure password hashing with bcrypt

For security vulnerabilities, please contact the development team.

## Support

For support and inquiries, please contact:
- Email: support@atrokssecurity.com
- Website: [Atroks Security Services](https://atrokssecurity.com)

## License

This project is proprietary software. All rights reserved.

## Credits

Developed by [MycoSoft](https://github.com/mycosoft)

---

**Version**: 1.0.0  
**Last Updated**: February 2026
