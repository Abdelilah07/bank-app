<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            {{ __('Liste des transactions') }}
        </h2>
    </x-slot>

    <div class="container p-8 mx-auto">
        @if($transactions->isEmpty())
        <div class="alert alert-info">
            <span>Aucune transaction n'a été effectuée.</span>
        </div>
        @else
        <div class="overflow-x-auto bg-base-100 rounded-box p-4 shadow-sm">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>User</th>
                        <th>Montant</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="hover">
                        <td>
                            <div class="badge badge-soft {{ $transaction->type === 'deposit' ? 'badge-success' : 'badge-error' }}">
                                {{ $transaction->type }}
                            </div>
                        </td>
                        <td>{{ $transaction->comptebancaire->user->name }}</td>
                        <td>{{ $transaction->amount }} €</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</x-app-layout>