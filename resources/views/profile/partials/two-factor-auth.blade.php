@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
<div class="space-y-6">
    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Twee-factor authenticatie</h3>

    @if (! auth()->user()->two_factor_secret)
        <p class="text-sm text-gray-600 dark:text-gray-300">Je hebt nog geen twee-factor authenticatie ingesteld. Activeer het om extra beveiliging toe te voegen.</p>

        <form method="POST" action="{{ route('two-factor.enable') }}">
            @csrf
            <button type="submit" class="mt-3 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Activeer 2FA</button>
        </form>
    @else
        <p class="text-sm text-gray-600 dark:text-gray-300">Twee-factor authenticatie is actief voor je account.</p>

        <div class="mt-4">
            <form method="POST" action="{{ route('two-factor.disable') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Deactiveer 2FA</button>
            </form>
        </div>

        <div class="mt-4">
            <h4 class="font-semibold text-gray-800 dark:text-gray-200">Herstelcodes</h4>
            @if (session('status') === 'two-factor-authentication-enabled')
                <div class="mt-2 p-4 bg-green-50 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-md">Sla je herstelcodes op op een veilige plaats.</div>
            @endif

            <form method="POST" action="{{ route('two-factor.recovery-codes') }}">
                @csrf
                <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md">Toon/Herladen herstelcodes</button>
            </form>
        </div>
    @endif
</div>
@endif
