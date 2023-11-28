<x-form-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')


        <!-- Post title -->
        <div>
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input id="title" class="block mt-1 w-full" name="title" value="{{ $post->title }}" required
                          autofocus
                          autocomplete="title"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>

        <!-- Post content -->
        <div class="mt-4">
            <x-input-label for="content" :value="__('Content')"/>
            <x-textarea id="content" class="block mt-1 w-full"
                        name="content"
                        required autocomplete="content">{{ $post->content }}</x-textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
        </div>

        <!-- Post category -->
        <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')"/>

            @php($category = App\Models\Category::find($post->category_id))


            <select name="category_id" id="category_id"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                    required>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                            @if($category->id == $post->category_id)
                                selected
                        @endif>{{ $category->name }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-form-layout>
