<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-3">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Posts') }}
                </h2>
            </div>
            <div>
                <a href="{{ route('admin.post.create') }}">
                    <button class="block border-gray-400 border-2 p-4">Create New Post</button>
                </a>
            </div>

            <div>
                <form action="{{ route('admin.post.search') }}" method="get">
                    <div class="form-group mb-6">
                        <label for="search"
                               class="form-label inline-block mb-2 text-gray-700">Search</label>
                        <input type="text" class="form-control block
                                        w-full
                                        px-3
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="slug"
                               placeholder="search" name="search">
                    </div>
                </form>
            </div>
        </div>

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

                    {{ $posts->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
