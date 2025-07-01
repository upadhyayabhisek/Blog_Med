<x-app-layout>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <x-category-tabs>
            Not Loaded!
        </x-category-tabs>
    </div>


    <div class="mt-8 text-gray-900">
        <div class="p-4">
            @forelse($posts as $post)
                @php
                    $post_size = str_word_count($post->description);
                    $read_time = number_format($post_size/150,2);
                @endphp
                <x-post-item :post="$post"/>
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
