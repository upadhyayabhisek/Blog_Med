<x-app-layout>


    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <x-category-tabs>
            Not Loaded!
        </x-category-tabs>
    </div>


    <h1 class="text-4xl font-bold text-red-600">Tailwind is working!</h1>


    <div class="mt-8 text-gray-900">
        <div class="p-4">
            @forelse($posts as $post)
                <x-post-item :post="$post"></x-post-item>
                @empty
                <div style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    ">
                        <p>No Post Uploaded</p>
                </div>

            @endforelse

        </div>

        <div style="display: flex; justify-content: center; margin-top: 20px;">
            {{ $posts->onEachSide(1)->links() }}
        </div>

    </div>


</x-app-layout>
