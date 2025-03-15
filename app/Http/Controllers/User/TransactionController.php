<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompteBancaire;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request, CompteBancaire $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'type' => 'required|in:deposit,withdrawal',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $amount = $request->amount;
        if ($request->type === 'withdrawal') {
            if ($account->balance < $amount) {
                return back()->withErrors(['amount' => 'Solde insuffisant']);
            }
            $amount = -$amount;
        }

        $transaction = new Transaction([
            'compte_bancaire_id' => $account->id,
            'type' => $request->type,
            'amount' => $amount,
            'description' => $request->description,
        ]);
        $transaction->save();

        $account->balance += $amount;
        $account->save();

        return redirect()->route('user.accounts.show', $account)->with('success', 'Transaction effectuée');
    }
}
