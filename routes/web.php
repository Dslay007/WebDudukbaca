<?php

use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\OpacController;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/struktur', function () {
    return view('pages.struktur');
})->name('page.struktur');

Route::get('/jurnal', function () {
    return view('pages.jurnal');
})->name('page.jurnal');

Route::get('/opac', [OpacController::class, 'index'])->name('opac.index');
Route::get('/opac/detail/{id}', [OpacController::class, 'show'])->name('opac.show');

// Content Routes
Route::get('/page/{path}', [ContentController::class, 'show'])->name('content.show');

// Member Routes
Route::get('/member/login', [MemberAuthController::class, 'showLoginForm'])->name('login');
Route::post('/member/login', [MemberAuthController::class, 'login'])->name('member.login');
Route::get('/register', [\App\Http\Controllers\MemberRegisterController::class, 'showRegistrationForm'])->name('member.register');
Route::post('/register', [\App\Http\Controllers\MemberRegisterController::class, 'register'])->name('member.register.post');
Route::post('/member/logout', [MemberAuthController::class, 'logout'])->name('member.logout');

Route::middleware('auth:member')->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
});

// Admin Routes
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Bibliography Module
    Route::get('/biblio', [\App\Http\Controllers\Admin\BiblioController::class, 'index'])->name('biblio.index');
    Route::get('/biblio/create', [\App\Http\Controllers\Admin\BiblioController::class, 'create'])->name('biblio.create');
    Route::post('/biblio', [\App\Http\Controllers\Admin\BiblioController::class, 'store'])->name('biblio.store');
    Route::get('/biblio/{id}/edit', [\App\Http\Controllers\Admin\BiblioController::class, 'edit'])->name('biblio.edit');
    Route::put('/biblio/{id}', [\App\Http\Controllers\Admin\BiblioController::class, 'update'])->name('biblio.update');
    Route::delete('/biblio/{id}', [\App\Http\Controllers\Admin\BiblioController::class, 'destroy'])->name('biblio.destroy');

    // Membership Module
    Route::resource('member', \App\Http\Controllers\Admin\MemberController::class);

    // Circulation Module
    Route::get('/circulation', [\App\Http\Controllers\Admin\CirculationController::class, 'index'])->name('circulation.index');
    Route::post('/circulation/start', [\App\Http\Controllers\Admin\CirculationController::class, 'start'])->name('circulation.start');
    Route::get('/circulation/transaction/{member_id}', [\App\Http\Controllers\Admin\CirculationController::class, 'transaction'])->name('circulation.transaction');
    Route::post('/circulation/loan/{member_id}', [\App\Http\Controllers\Admin\CirculationController::class, 'storeLoan'])->name('circulation.loan');
    Route::post('/circulation/return/{loan_id}', [\App\Http\Controllers\Admin\CirculationController::class, 'returnLoan'])->name('circulation.return');

    // Master Files
    Route::resource('author', \App\Http\Controllers\Admin\AuthorController::class);
    Route::resource('publisher', \App\Http\Controllers\Admin\PublisherController::class);
    Route::resource('gmd', \App\Http\Controllers\Admin\GmdController::class);
    Route::resource('topic', \App\Http\Controllers\Admin\TopicController::class);
    Route::resource('place', \App\Http\Controllers\Admin\PlaceController::class);
    Route::resource('item_status', \App\Http\Controllers\Admin\ItemStatusController::class);

    // Item Management (Barcodes)
    Route::get('/item', [\App\Http\Controllers\Admin\ItemController::class, 'index'])->name('item.index');
    Route::post('/item/print-barcodes', [\App\Http\Controllers\Admin\ItemController::class, 'printBarcodes'])->name('item.print_barcodes');
});

