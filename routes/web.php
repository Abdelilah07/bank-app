<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\User\AccountController as UserAccountController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->usertype === 'admin') {
        $totalUsers = \App\Models\User::count();
        $totalAccounts = \App\Models\CompteBancaire::count();
        $totalTransactions = \App\Models\Transaction::count();
        return view('admin.dashboard', compact('totalUsers', 'totalAccounts', 'totalTransactions'));
    } else {
        $accounts = Auth::user()->compteBancaires;
        return view('user.dashboard', compact('accounts'));
    }
})->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('accounts', AdminAccountController::class);
    Route::resource('transactions', AdminTransactionController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('accounts', [UserAccountController::class, 'index'])->name('user.accounts.index');
    Route::get('accounts/{account}', [UserAccountController::class, 'show'])->name('user.accounts.show');
    Route::post('accounts/{account}/transactions', [UserTransactionController::class, 'store'])->name('user.transactions.store');
});

require __DIR__ . '/auth.php';
