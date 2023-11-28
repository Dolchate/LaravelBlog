<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}">
                    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6"
                         style="border: 3px solid {{ $post->category->color }}">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <li class="pt-2">
                                {{ $post->title }}
                            </li>
                        </div>
                    </div>
                </a>
            @endforeach
            <div class="p-5">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>



















