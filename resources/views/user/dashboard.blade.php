<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tableau de bord Utilisateur</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Vos comptes</h2>
        
        <div class="grid gap-4">
            @foreach($accounts as $account)
            <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-lg font-medium text-gray-700">{{ $account->account_number }}</span>
                        <p class="text-gray-600">Solde: <span class="font-semibold">{{ $account->balance }} €</span></p>
                    </div>
                    <a 
                        href="{{ route('user.accounts.show', $account) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                    >
                        Consulter
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>