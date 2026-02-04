# AGENTS.md - Atroks Security Services

This document provides essential information for AI agents working on this Laravel-based security services application.

## Project Overview

- **Framework**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade templates with Tailwind CSS, Alpine.js, Vite
- **Authentication**: Laravel Breeze
- **Admin Panel**: Laravel AdminLTE
- **Testing**: Pest PHP
- **Code Style**: Laravel Pint

## Build, Lint, and Test Commands

### Development Environment
```bash
# Setup project (first time)
composer setup

# Start development server with all services
composer dev

# Alternative: Start individual services
php artisan serve
npm run dev
php artisan queue:listen --tries=1
```

### Testing Commands
```bash
# Run all tests
composer test
# or
php artisan test

# Run specific test file
php artisan test tests/Feature/ExampleTest.php
php artisan test tests/Unit/ExampleTest.php

# Run tests with Pest directly
./vendor/bin/pest
./vendor/bin/pest tests/Feature/ExampleTest.php

# Run single test method
php artisan test --filter=test_example
./vendor/bin/pest --filter=test_example

# Run with coverage (requires Xdebug)
./vendor/bin/pest --coverage
```

### Code Quality & Formatting
```bash
# Run Laravel Pint (PHP code formatter)
./vendor/bin/pint

# Check formatting without applying changes
./vendor/bin/pint --test

# Fix specific file
./vendor/bin/pint app/Models/User.php

# Run Pint with verbose output
./vendor/bin/pint -v
```

### Frontend Build Commands
```bash
# Install dependencies
npm install

# Development build with hot reload
npm run dev

# Production build
npm run build
```

### Database Commands
```bash
# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Run specific migration
php artisan migrate --path=database/migrations/2025_12_30_201440_add_contact_fields_to_safe_keeping_records_table.php

# Seed database
php artisan db:seed

# Refresh database (migrate + seed)
php artisan migrate:refresh --seed
```

## Code Style Guidelines

### PHP Code Style
- Follow PSR-12 standards (enforced by Laravel Pint)
- Use strict types where appropriate
- Follow Laravel's naming conventions and patterns

### Import Organization
```php
// Correct import order:
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Example extends Model
{
    use HasFactory;
}
```

### Type Declarations
- Use PHP 8.2+ type hints for parameters and return types
- Use `list<string>` for indexed arrays
- Use `array<string, string>` for associative arrays
- Use `?string` for nullable types

### Naming Conventions
- **Classes**: PascalCase (e.g., `SafeKeepingRecord`)
- **Methods**: camelCase (e.g., `getClientName`)
- **Variables**: camelCase (e.g., `$referenceNumber`)
- **Constants**: UPPER_SNAKE_CASE (e.g., `MAX_RECORDS`)
- **Database tables**: snake_case, plural (e.g., `safe_keeping_records`)
- **Database columns**: snake_case (e.g., `reference_number`)

### Model Conventions
```php
class SafeKeepingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'client_id',
        // ...
    ];

    protected $casts = [
        'stored_at' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
```

### Error Handling
- Use Laravel's exception handling system
- Throw appropriate exceptions with meaningful messages
- Use try-catch blocks for expected failures
- Log errors using Laravel's logging facade

### Blade Templates
- Use Tailwind CSS utility classes
- Include Alpine.js for interactivity
- Use Laravel components where appropriate
- Keep templates clean and focused on presentation

### Route Definitions
```php
// Use named routes
Route::get('/track', [TrackingController::class, 'index'])->name('tracking.index');

// Resource controllers
Route::resource('safe-keeping', SafeKeepingController::class)->parameters([
    'safe-keeping' => 'record'
]);

// Middleware groups
Route::middleware(['auth', 'verified'])->group(function () {
    // Protected routes
});
```

### Testing Guidelines
- Write tests using Pest PHP syntax
- Use descriptive test names
- Follow Arrange-Act-Assert pattern
- Use database factories for test data
- Mock external services when appropriate

### Security Considerations
- Always validate and sanitize user input
- Use Laravel's built-in CSRF protection
- Implement proper authorization checks
- Never commit sensitive data (.env, credentials)
- Use prepared statements for database queries

## Project Structure Notes

### Key Directories
- `app/Models/` - Eloquent models
- `app/Http/Controllers/` - Application controllers
- `resources/views/` - Blade templates
- `database/migrations/` - Database migrations
- `routes/` - Route definitions
- `tests/` - Test files

### Key Models
- `User` - Authentication and user management
- `SafeKeepingRecord` - Main business entity for security storage
- `Client` - Client information management

### Key Features
- Safe keeping record management with QR codes
- Client tracking and management
- Admin dashboard with statistics
- Public tracking interface
- User authentication and authorization

## Agent Instructions

1. **Always run tests** after making changes
2. **Run Laravel Pint** before committing code
3. **Follow existing patterns** in the codebase
4. **Use descriptive commit messages** that explain the "why"
5. **Check for Cursor/Copilot rules** in `.cursor/` or `.github/` directories
6. **Never commit sensitive data** or environment files
7. **Verify database migrations** work correctly
8. **Test both frontend and backend** changes

## Troubleshooting

If you encounter issues:
1. Clear configuration cache: `php artisan config:clear`
2. Clear view cache: `php artisan view:clear`
3. Clear route cache: `php artisan route:clear`
4. Clear compiled classes: `php artisan clear-compiled`
5. Dump autoload: `composer dump-autoload`

## Quick Reference

```bash
# Most common commands
composer dev          # Start development
php artisan test      # Run tests
./vendor/bin/pint     # Format code
npm run dev          # Start frontend dev server
php artisan migrate  # Run migrations
```