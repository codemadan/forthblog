<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->Title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="bg-white p-4 shadow-xl sm:rounded-lg">
                    {!! $post->content !!}
                </div>
                <div class="bg-white p-4 shadow-xl sm:rounded-lg mt-5">
                    <ul class="categories list-disc">
                        @foreach($post->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
