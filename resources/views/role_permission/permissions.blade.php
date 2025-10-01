@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Permissies overzicht</h1>
    <table class="min-w-full bg-white dark:bg-gray-800">
        <thead>
            <tr>
                <th class="py-2">Permissie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissies as $permissie)
            <tr>
                <td class="py-2">{{ $permissie->naam }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
