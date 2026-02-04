<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [\App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/projects', [\App\Http\Controllers\HomeController::class, 'projects'])->name('projects');
Route::get('/faqs', [\App\Http\Controllers\HomeController::class, 'faqs'])->name('faqs');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/quote', [\App\Http\Controllers\HomeController::class, 'quote'])->name('quote');

Route::get('/track', [\App\Http\Controllers\TrackingController::class, 'index'])->name('tracking.index');
Route::post('/track', [\App\Http\Controllers\TrackingController::class, 'track'])->name('tracking.search');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $totalRecords = \App\Models\SafeKeepingRecord::count();
        $totalUsers = \App\Models\User::count();
        $totalClients = \App\Models\Client::count();
        $recentRecords = \App\Models\SafeKeepingRecord::with('client')->latest()->take(5)->get();

        return view('dashboard', compact('totalRecords', 'totalUsers', 'totalClients', 'recentRecords'));
    })->name('dashboard');

    Route::resource('safe-keeping', \App\Http\Controllers\SafeKeepingController::class)->parameters([
        'safe-keeping' => 'record',
    ]);
    Route::post('/safe-keeping/{record}/send-email', [\App\Http\Controllers\SafeKeepingController::class, 'sendEmail'])->name('safe-keeping.send-email');
    Route::post('/safe-keeping/{record}/add-status', [\App\Http\Controllers\SafeKeepingController::class, 'addStatus'])->name('safe-keeping.add-status');
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::get('/settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [\App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
    Route::post('/settings/test-smtp', [\App\Http\Controllers\SettingsController::class, 'testSmtp'])->name('settings.test-smtp');

    // Backend Tracking
    Route::get('/admin/track', [\App\Http\Controllers\TrackingController::class, 'adminIndex'])->name('admin.tracking.index');
    Route::post('/admin/track', [\App\Http\Controllers\TrackingController::class, 'adminTrack'])->name('admin.tracking.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
