@php
    use App\Models\User;
    $defaultImages = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIYYU16HpQLz_WTVKkwSlHPQaSa8NM7hXrOI6XZdjUW1ZkVMkwHY5RhDf0LDe6Qm2tDY8&usqp=CAU",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwaC2JFGV1ztlUeZeuElwPBFz2lJHjuxAn-w&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXYy2wAj-vSX-KOnlhY9iIGTYa-TudJ4bcx4fDnbpWjTpJ3i2WOBm10jr4k4o7t8Q8I28&usqp=CAU",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2zg2x2H1o-uJ-YrksVRUTHWg64r5zr1zQd_x6KN4GL-GCfd0xuyMeqQgNogaaE8hC9CQ&usqp=CAU"
    ];
    $randomDefaultImage = $defaultImages[array_rand($defaultImages)];
@endphp



<x-app-layout>
    <div class="py-10 flex justify-center items-start min-h-screen bg-gray-50 dark:bg-gray-900 pt-16">
        <div class="w-full max-w-5xl p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-5xl mx-auto space-y-6">


                    <div>
                        <h1 class="text-5xl font-bold text-gray-900 dark:text-white">{{ ucfirst($post->title) }}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                            Published on {{ $post->created_at->format('d M Y') }}
                            <a href="{{ route('post.byCategory', $post->category) }}" class="inline-block p-4 border-b-2 rounded-t-lg
                                text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300
                                dark:text-gray-400 dark:hover:text-gray-300 dark:border-gray-700">
                                Category : {{$post->category->name}}
                            </a>
                        </p>

                    </div>

                    <div class="flex gap-5 items-center mb-6 border-gray-200 dark:border-gray-700 pb-4">
                        @if($post->user->image)
                            <a href="{{ route('profile.show', $post->user) }}">
                                <img
                                    src="{{ Storage::url($post->user->image) }}"
                                    alt="Author Image"
                                    class="w-16 h-16 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600 hover:scale-105 transition-transform duration-300"
                                >
                            </a>
                        @else
                            <a href="{{ route('profile.show', $post->user) }}">
                                <img
                                    src="{{ $randomDefaultImage }}"
                                    alt="Default Author Image"
                                    class="w-16 h-16 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600 hover:scale-105 transition-transform duration-300"
                                >
                            </a>
                        @endif
                            <a href="{{ route('profile.show', $post->user) }}"
                               class="text-blue-600 dark:text-blue-400 font-medium text-base hover:underline hover:text-blue-800 dark:hover:text-blue-300 transition duration-150">
                                Posted by {{ $post->user->name }}
                            </a>

{{--                            <div x-data="{ following: {{--}}
{{--                                User::find($post->user_id)->isFollowedBy(auth()->user()) ? 'true' : 'false'}}, }">--}}
{{--                                @if(auth()->user() && auth()->user()->id !== $post->user_id)--}}
{{--                                <a href="#" x-text="following ? 'Unfollow' : 'Follow'" class="inline-block px-5 py-2 text-sm font-semibold text-white bg-green-600 rounded-full hover:bg-green-700 transition duration-200 shadow-md">--}}
{{--                                    Follow--}}
{{--                                </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}

                    </div>

                    <!-- Like Section -->
                    <x-like-button :post="$post"></x-like-button>


                    <!-- Word Count & Read Time -->
                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 gap-3 mb-6 border-gray-200 dark:border-gray-700 pt-4">
                        <span>{{ str_word_count($post->description) }} words</span>
                        <span class="text-gray-400">•</span>
                        <span>{{ $post->readTime() }} minute read</span>
                    </div>

                    <div class="prose dark:prose-invert lg:prose-lg max-w-none text-gray-800 dark:text-gray-100">
                        <img src="{{Storage::url($post->image)}}" alt="Post Image">
                        <p class="mt-5">
                            {!! nl2br(e($post->description)) !!} <!-- Preserve html line break-->
                        </p>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
