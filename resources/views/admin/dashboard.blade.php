<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Admin') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stats Cards -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-gray-500 text-sm font-semibold">Total Users</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-gray-500 text-sm font-semibold">Total Accounts</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $totalAccounts }}</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-gray-500 text-sm font-semibold">Total Transactions</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $totalTransactions }}</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('accounts.index') }}"
                class="btn btn-primary">
                Gérer les comptes
            </a>
            <a href="{{ route('transactions.index') }}"
                class="btn btn-primary">
                Gérer les transactions
            </a>
        </div>
    </div>
</x-app-layout>