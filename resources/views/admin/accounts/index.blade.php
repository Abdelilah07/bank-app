<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Compte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-700">Gérer les comptes</h1>
                        <a href="{{ route('accounts.create') }}" 
                           class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                            Créer un compte
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Propriétaire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Solde</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($accounts as $account)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $account->account_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $account->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $account->balance }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('accounts.edit', $account) }}" 
                                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition duration-200">
                                                Modifier
                                            </a>
                                            <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="inline">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $accounts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>