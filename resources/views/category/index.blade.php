<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-4 shadow-xl sm:rounded-lg">
                        <h2>Create Category</h2>
                        {{--Form to create Category--}}
                        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                            <form action="{{ route('admin.category.store') }}" method="post">
                                @csrf
                                <div class="form-group mb-6">
                                    <label for="name" class="form-label inline-block mb-2 text-gray-700">Name</label>
                                    <input type="text" class="form-control
                                        block
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
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="name"
                                           placeholder="Enter Category Name"
                                    name="name">
                                </div>
                                <div class="form-group mb-6">
                                    <label for="slug"
                                           class="form-label inline-block mb-2 text-gray-700">Slug</label>
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
                                           placeholder="Slug" name="slug">
                                </div>
                                <button type="submit" class="
                                      px-6
                                      py-2.5
                                      bg-blue-600
                                      text-white
                                      font-medium
                                      text-xs
                                      leading-tight
                                      uppercase
                                      rounded
                                      shadow-md
                                      hover:bg-blue-700 hover:shadow-lg
                                      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                      active:bg-blue-800 active:shadow-lg
                                      transition
                                      duration-150
                                      ease-in-out" name="submit">Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="bg-white p-4 shadow-xl sm:rounded-lg">
                        <h2>Category List</h2>
                        <ul class="list-disc px-4">
                            @foreach($categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
