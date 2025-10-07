@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-12 min-h-[60vh] flex flex-col items-center justify-center">
        <div class="w-full px-6 py-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex flex-col items-center gap-6">
            <svg class="w-16 h-16 text-blue-500 dark:text-blue-300 mb-2" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <div class="text-2xl font-bold text-gray-900 dark:text-gray-100 text-center">Welkom, {{ Auth::user()->name }}!
            </div>
            <div class="text-lg text-gray-700 dark:text-gray-300 text-center mb-6">Je bent succesvol ingelogd.</div>
            <div class="w-full flex flex-col gap-3">
                <a href="/profile"
                    class="block w-full text-center px-6 py-3 rounded-xl bg-blue-700 hover:bg-blue-700 text-white font-bold shadow transition">Profiel</a>
                <a href="/gebruikers"
                    class="block w-full text-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-800 text-white font-bold shadow transition">Gebruikers
                    overzicht</a>
                <a href="/rollen"
                    class="block w-full text-center px-6 py-3 rounded-xl bg-blue-500 hover:bg-blue-600 text-white font-bold shadow transition">Rollen
                    overzicht</a>
                <a href="/permissies"
                    class="block w-full text-center px-6 py-3 rounded-xl bg-blue-400 hover:bg-blue-500 text-white font-bold shadow transition">Permissies
                    overzicht</a>
            </div>
        </div>
    </div>
@endsection
