<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'compte_bancaire_id' => 1,
                'type' => 'deposit',
                'amount' => 1000,
                'description' => 'Initial deposit'
            ],
            [
                'compte_bancaire_id' => 2,
                'type' => 'deposit',
                'amount' => 5000,
                'description' => 'Initial deposit'
            ]
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}
