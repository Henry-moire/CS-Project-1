<x-app-layout>
<form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="name" class="block mt-1" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Date')" />
            <x-text-input id="date" class="block mt-1" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tags" :value="__('Tags')" />
            <x-text-input id="tags" class="block mt-2 w-full" type="text" name="tags" :value="old('tags')" required autofocus autocomplete="tags" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="schedule" :value="__('Schedule')" />
            <x-text-input id="schedule" class="block mt-1" type="text" name="schedule" :value="old('schedule')" required autofocus autocomplete="schedule" />
            <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="skills" :value="__('Skills')" />
            <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')" required autofocus autocomplete="skills" />
            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="requirements" :value="__('Requirements')" />
            <x-text-input id="requirements" class="block mt-1" type="text" name="requirements" :value="old('requirements')" required autofocus autocomplete="requirements" />
            <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="no_of_volunteers_needed" :value="__('Number of volunteers needed')" />
            <x-text-input id="no_of_volunteers_needed" class="block mt-1" type="int" name="no_of_volunteers_needed" :value="old('no_of_volunteers_needed')" required autofocus autocomplete="no_of_volunteers_needed" />
            <x-input-error :messages="$errors->get('no_of_volunteers_needed')" class="mt-2" />
        </div>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
