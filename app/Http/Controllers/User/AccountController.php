<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompteBancaire;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Auth::user()->compteBancaires;
        return view('user.accounts.index', compact('accounts'));
    }

    public function show(CompteBancaire $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }
        $transactions = $account->transactions()->paginate(10);
        return view('user.accounts.show', compact('account', 'transactions'));
    }
}