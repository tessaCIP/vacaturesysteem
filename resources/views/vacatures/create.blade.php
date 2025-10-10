
@extends('layouts.app')
@section('content')
    <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-6">Vacature toevoegen</h1>
        <form method="POST" action="{{ route('vacatures.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="functietitel" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Functietitel</label>
                <input type="text" name="functietitel" id="functietitel" class="form-input w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100" required>
            </div>
            <div class="mb-4">
                <label for="bedrijf_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Bedrijf</label>
                <select name="bedrijf_id" id="bedrijf_id" class="form-select w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100" required>
                    <option value="">Kies bedrijf</option>
                    @foreach($bedrijven as $bedrijf)
                        <option value="{{ $bedrijf->id }}">{{ $bedrijf->naam }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="status_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Status</label>
                <select name="status_id" id="status_id" class="form-select w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100" required>
                    <option value="">Kies status</option>
                    @foreach($statussen as $status)
                        <option value="{{ $status->id }}">{{ $status->naam }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="contactpersoon_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Contactpersoon</label>
                <select name="contactpersoon_id" id="contactpersoon_id" class="form-select w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100" required>
                    <option value="">Kies contactpersoon</option>
                    @foreach($contactpersonen as $contactpersoon)
                        <option value="{{ $contactpersoon->id }}">{{ $contactpersoon->voornaam }} {{ $contactpersoon->achternaam }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="uren_per_week" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Uren per week</label>
                <input type="text" name="uren_per_week" id="uren_per_week" class="form-input w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <div class="mb-4">
                <label for="uiterste_datum_aanbieding" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Uiterste datum aanbieding</label>
                <input type="date" name="uiterste_datum_aanbieding" id="uiterste_datum_aanbieding" class="form-input w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100">
            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">Opslaan</button>
        </form>
    </div>
@endsection
