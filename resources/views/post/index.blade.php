<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="bg-white p-4 shadow-xl sm:rounded-lg">
                    <h2>Post List</h2>
                    <ul class="list-disc px-4">
                        @foreach($posts as $post)
                            <li><a href="{{ route('admin.post.show', $post->slug) }}">{{ $post->Title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
