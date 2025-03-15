<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-base-content">
            {{ __('Gérer les comptes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <div class="flex justify-end items-center mb-6">
                        <a href="{{ route('accounts.create') }}" 
                           class="btn btn-primary">
                            Créer un compte
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Propriétaire</th>
                                    <th>Solde</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $account->account_number }}</td>
                                    <td>{{ $account->user->name }}</td>
                                    <td>{{ $account->balance }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('accounts.edit', $account) }}" 
                                               class="btn btn-warning btn-sm">
                                                Modifier
                                            </a>
                                            <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="inline">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-error btn-sm"
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