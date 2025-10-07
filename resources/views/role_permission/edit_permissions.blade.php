@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-10">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-extrabold text-blue-600 dark:text-blue-300 mb-6 text-center drop-shadow">Permissies
                bewerken voor rol: <span class="text-gray-900 dark:text-gray-100">{{ $rol->naam }}</span></h1>
            <form method="POST" action="{{ url('/rollen/' . $rol->id . '/permissies') }}">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    @foreach ($permissies as $permissie)
                        <label
                            class="flex items-center space-x-3 bg-gray-50 dark:bg-gray-700 rounded-lg px-4 py-2 cursor-pointer transition hover:bg-blue-50 dark:hover:bg-blue-900">
                            <input type="checkbox" name="permissie_ids[]" value="{{ $permissie->id }}"
                                class="form-checkbox h-5 w-5 text-blue-600 dark:text-blue-400 border-gray-300 dark:border-gray-600"
                                {{ $rol->permissies->contains($permissie->id) ? 'checked' : '' }}>
                            <span class="text-gray-900 dark:text-gray-100 font-medium">{{ $permissie->naam }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="flex justify-end gap-2">
                    <a href="{{ url('/rollen') }}"
                        class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition">Annuleren</a>
                    <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-bold hover:bg-blue-700 transition shadow">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
