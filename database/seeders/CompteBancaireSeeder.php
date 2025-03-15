<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompteBancaire;

class CompteBancaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $compteBancaires = [
            [
                'user_id' => 1,
                'account_number' => '123456789',
                'balance' => 10000
            ],
            [
                'user_id' => 2,
                'account_number' => '987654321',
                'balance' => 5000
            ]
        ];

        foreach ($compteBancaires as $compteBancaire) {
            CompteBancaire::create($compteBancaire);
        }
    }
}
