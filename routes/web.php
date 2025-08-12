<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // Check if user has Super Admin role, redirect accordingly
        if (auth()->user()->hasRole('Super Admin')) {
            return redirect()->route('admin.dashboard');
        }
        
        // For regular users/voters, show default dashboard
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'super.admin'
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    
    // Placeholder routes for navigation (will be implemented later)
    Route::get('/elections', function () { return 'Elections Page'; })->name('elections.index');
    Route::get('/elections/create', function () { return 'Create Election Page'; })->name('elections.create');
    Route::get('/elections/active', function () { return 'Active Elections Page'; })->name('elections.active');
    
    Route::get('/candidates', function () { return 'Candidates Page'; })->name('candidates.index');
    Route::get('/candidates/create', function () { return 'Add Candidate Page'; })->name('candidates.create');
    
    Route::get('/voters', function () { return 'Voters Page'; })->name('voters.index');
    Route::get('/voters/create', function () { return 'Add Voter Page'; })->name('voters.create');
    Route::get('/voters/import', function () { return 'Import Voters Page'; })->name('voters.import');
    
    Route::get('/results', function () { return 'Results Page'; })->name('results.index');
    Route::get('/results/export', function () { return 'Export Results Page'; })->name('results.export');
    Route::get('/reports/audit', function () { return 'Audit Trail Page'; })->name('reports.audit');
    
    Route::get('/otp/generate', function () { return 'Generate OTPs Page'; })->name('otp.generate');
    Route::get('/otp/send', function () { return 'Send OTPs Page'; })->name('otp.send');
    Route::get('/otp/logs', function () { return 'OTP Logs Page'; })->name('otp.logs');
    
    Route::get('/settings', function () { return 'Settings Page'; })->name('settings.index');
    Route::get('/notifications', function () { return 'Notifications Page'; })->name('notifications.index');
});
