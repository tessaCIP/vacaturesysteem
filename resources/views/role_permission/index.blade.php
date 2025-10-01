@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-8">
    <h1 class="text-3xl font-extrabold mb-10 text-center text-blue-400 dark:text-blue-300 drop-shadow">Rollen overzicht</h1>
    <div class="overflow-x-auto rounded-2xl shadow-lg bg-gray-100 dark:bg-gray-900 p-4">
        <table class="min-w-full rounded-xl overflow-hidden">
            <thead>
                <tr class="bg-blue-100 dark:bg-blue-900">
                    <th class="px-6 py-4 text-left text-sm font-bold text-blue-900 dark:text-blue-200 uppercase tracking-wider">Rol</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-blue-900 dark:text-blue-200 uppercase tracking-wider">Permissies</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-blue-900 dark:text-blue-200 uppercase tracking-wider">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rollen as $rol)
                <tr class="bg-white dark:bg-gray-800 hover:bg-blue-50 dark:hover:bg-gray-700 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900 dark:text-blue-200">{{ $rol->naam }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $rol->permissies->pluck('naam')->join(', ') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form method="POST" action="/rollen/{{ $rol->id }}/permissies" class="flex items-center gap-2">
                            @csrf
                            <select name="permissie_ids[]" multiple class="border border-blue-400 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-400">
                                @foreach(App\Models\Permissie::all() as $permissie)
                                    <option value="{{ $permissie->id }}" @if($rol->permissies->contains($permissie)) selected @endif>{{ $permissie->naam }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">Opslaan</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
