<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-blue-600 dark:text-blue-300 tracking-tight drop-shadow">
            {{ __('Profiel') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-[60vh] flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-2xl space-y-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.two-factor-auth')
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
