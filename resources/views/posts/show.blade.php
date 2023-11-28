@vite(['resources/css/bootstrap.css'])
<title>{{ __($post->title) }}</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="text-align: center">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-100">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                 style="border: 3px solid {{ $category->color }}">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $post->content }}
                </div>
                {{--                Si l'id de l'user connecté correspond à l'id de l'user qui a créé le post alor on affiche--}}
                @if(Auth::id() == $post->user_id)
                    <div class="pt-5">
                        <a href="{{ route('posts.edit', $post->id) }}">
                            <x-primary-button class="ml-5 float-left">
                                Edit
                            </x-primary-button>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mr-5 float-right">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
