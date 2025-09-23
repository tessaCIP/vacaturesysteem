<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Bedankt voor je registratie! Voordat je verder gaat, kun je je e-mailadres verifiëren door op de link te klikken
        die we je zojuist hebben gemaild? Als je de e-mail niet hebt ontvangen, sturen we graag een nieuwe.
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            Er is een nieuwe verificatielink verstuurd naar het e-mailadres dat je hebt opgegeven bij registratie.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    Verificatie e-mail opnieuw versturen
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Uitloggen
            </button>
        </form>
    </div>
</x-guest-layout>
