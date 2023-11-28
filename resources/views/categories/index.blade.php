@vite(['resources/css/bootstrap.css', 'resources/js/app.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($categories as $category)
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6"
                     style="border: 3px solid {{ $category->color }}">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <div class="float-left pt-2">
                            <li>
                                {{ $category->name }}
                            </li>
                        </div>
                        @if(Auth::id() == $category->user_id)
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                  class="float-right pb-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        @else
                            <div class="float-right pb-4">
                                <button class="btn btn-outline-danger" disabled>Delete</button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="p-5">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>








