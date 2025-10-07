@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-extrabold text-blue-600 dark:text-blue-300 mb-6 text-center drop-shadow">Gebruikers
                overzicht</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                Naam</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                Email</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">
                                Rollen</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $user->email }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200 flex items-center justify-between">
                                    {{ $user->rollen->pluck('naam')->join(', ') }}
                                    @if (auth()->user() && auth()->user()->hasRole('beheerder') && auth()->id() !== $user->id)
                                        <form method="POST" action="/gebruikers/{{ $user->id }}"
                                            onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');"
                                            class="inline-block ms-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded shadow">Verwijder</button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-gray-500 dark:text-gray-400 text-center">Geen
                                    gebruikers gevonden.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
