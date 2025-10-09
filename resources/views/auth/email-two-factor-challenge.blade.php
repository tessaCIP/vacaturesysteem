@extends('layouts.app')
@section('content')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-2xl font-bold mb-4">Inlogcode per e-mail</h2>
    @if(session('status'))
        <div class="mb-4 text-green-600">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('email-2fa.verify') }}">
        @csrf
        <div class="mb-4">
            <label for="code" class="block text-sm font-medium">Code uit je e-mail</label>
            <input id="code" name="code" type="text" inputmode="numeric" required class="mt-1 block w-full border rounded p-2" autofocus>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Verifiëren</button>
    </form>
    <form method="POST" action="{{ route('email-2fa.send') }}" class="mt-4">
        @csrf
        <button type="submit" class="underline text-sm text-blue-600">Stuur nieuwe code</button>
    </form>
    @if ($errors->any())
        <div class="mt-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
