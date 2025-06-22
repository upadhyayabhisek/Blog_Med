<x-app-layout>
    <div class="py-4 flex justify-center items-start min-h-screen pt-16">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700 w-full max-w-[calc(100%-400px)] p-6 bg-white rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-gray-900 text-center">Create Post to Upload</h1>
            <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST">

                @csrf

                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus placeholder="Enter title" maxLength="75" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input-area id="description" class="block mt-1 w-full" type="text" name="description" autofocus placeholder="Enter Decription" maxLength="10000" :value="old('description')">
                    </x-text-input-area>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image Upload')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" autofocus />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('Categories')" />
                    <select id="category_id" name="category_id">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"  @selected(old('category_id')==$category->id)>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-primary-button>
                        Post it
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
