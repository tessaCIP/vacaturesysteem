@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-2xl font-bold mb-4">Twee-factor authenticatie</h2>
    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf
        <div class="mb-4">
            <label for="code" class="block text-sm font-medium">Code uit je authenticator-app</label>
            <input id="code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" required class="mt-1 block w-full border rounded p-2" autofocus>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Verifiëren</button>
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
