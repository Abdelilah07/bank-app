<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Compte') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Tableau de bord Admin</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stats Cards -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-gray-500 text-sm font-semibold">Total Users</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-gray-500 text-sm font-semibold">Total Accounts</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $totalAccounts }}</p>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-gray-500 text-sm font-semibold">Total Transactions</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $totalTransactions }}</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('accounts.index') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                Gérer les comptes
            </a>
            <a href="{{ route('transactions.index') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                Gérer les transactions
            </a>
        </div>
    </div>
</x-app-layout>