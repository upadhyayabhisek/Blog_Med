<x-app-layout>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    </div>
    <h1 class="text-4xl font-bold text-red-600">create post bro</h1>
        <form action="{{route('post.store')}}" method="Post">
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus placeholder="Enter title" maxLength="75"/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
        </form>
    <div class="mt-8 text-gray-900">
    </div>
</x-app-layout>
