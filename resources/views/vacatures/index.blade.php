@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Vacature overzicht</h1>
            <a href="{{ route('vacatures.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">Vacature
                toevoegen</a>
        </div>
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded shadow">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Titel
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Bedrijf</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Contactpersoon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                            Acties</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($vacatures as $vacature)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vacature->functietitel }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vacature->bedrijf->naam ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vacature->status->naam ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vacature->contactpersoon->voornaam ?? '-' }}
                                {{ $vacature->contactpersoon->achternaam ?? '' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                <a href="{{ route('vacatures.edit', $vacature) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded shadow">Bewerken</a>
                                <form action="{{ route('vacatures.destroy', $vacature) }}" method="POST"
                                    onsubmit="return confirm('Weet je zeker dat je deze vacature wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded shadow">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
