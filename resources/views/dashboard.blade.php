<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-blue-600 dark:text-blue-300 tracking-tight drop-shadow">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-[60vh] flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div
            class="w-full max-w-xl mx-auto px-6 py-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex flex-col items-center gap-6">
            <svg class="w-16 h-16 text-blue-500 dark:text-blue-300 mb-2" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100 text-center">Welkom,
                {{ Auth::user()->name }}!</div>
            <div class="text-lg text-gray-700 dark:text-gray-300 text-center">Je bent succesvol ingelogd.<br>Gebruik het
                menu om verder te gaan.</div>
        </div>
    </div>
</x-app-layout>
