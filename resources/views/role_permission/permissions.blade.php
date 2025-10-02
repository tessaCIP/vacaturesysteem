@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-3xl font-extrabold text-blue-600 dark:text-blue-300 mb-6 text-center drop-shadow">Permissies overzicht</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase tracking-wider">Permissie</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($permissies as $permissie)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $permissie->naam }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">Geen permissies gevonden.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
