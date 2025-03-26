<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompteBancaire;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = CompteBancaire::with('user')->paginate(10);
        return view('admin.accounts.index', compact('accounts'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.accounts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_number' => 'required|unique:compte_bancaires',
            'balance' => 'numeric|min:0|nullable',
        ]);

        CompteBancaire::create([
            'user_id' => $request->user_id,
            'account_number' => $request->account_number,
            'balance' => $request->balance ?? 0,
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account created');
    }

    public function edit(CompteBancaire $account)
    {
        $users = User::all();
        return view('admin.accounts.edit', compact('account', 'users'));
    }

    public function update(Request $request, CompteBancaire $account)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_number' => 'required|unique:compte_bancaires,account_number,' . $account->id,
            'balance' => 'numeric|min:0',
        ]);

        $account->update($request->all());
        return redirect()->route('accounts.index')->with('success', 'Account updated');
    }

    public function destroy(CompteBancaire $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted');
    }
}