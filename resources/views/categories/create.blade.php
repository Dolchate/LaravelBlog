<x-form-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create category') }}
            </h2>
        </x-slot>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <!-- Category name -->
            <div class="pb-1">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Category color -->

            <div  style="width: 100%">
                <x-input-label for="color" :value="__('Color')" class="pb-1"/>
                <input id="color" name="color" type="color" required class="p-0" style="width: 4rem; height: 4rem;text-align: center; border: none"/>
                <x-input-error :messages="$errors->get('color')" class="mt-2"/>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
</x-form-layout>
