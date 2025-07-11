@php
    $defaultImages = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIYYU16HpQLz_WTVKkwSlHPQaSa8NM7hXrOI6XZdjUW1ZkVMkwHY5RhDf0LDe6Qm2tDY8&usqp=CAU",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwaC2JFGV1ztlUeZeuElwPBFz2lJHjuxAn-w&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXYy2wAj-vSX-KOnlhY9iIGTYa-TudJ4bcx4fDnbpWjTpJ3i2WOBm10jr4k4o7t8Q8I28&usqp=CAU",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2zg2x2H1o-uJ-YrksVRUTHWg64r5zr1zQd_x6KN4GL-GCfd0xuyMeqQgNogaaE8hC9CQ&usqp=CAU"
    ];
    $randomDefaultImage = $defaultImages[array_rand($defaultImages)];
@endphp


<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                    <div class="flex flex-col items-center text-center">
                        @if($user->image)
                            <img
                                src="{{ Storage::url($user->image) }}"
                                alt="Author Image"
                                class="w-48 h-48 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600 hover:scale-105 transition-transform duration-300"
                            >
                        @else
                            <img
                                src="{{ $randomDefaultImage }}"
                                alt="Default Author Image"
                                class="w-48 h-48 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600 hover:scale-105 transition-transform duration-300"
                            >
                        @endif

                        <h2 class="mt-4 text-xl font-semibold text-grey-600 dark:text-grey-400">
                            {{ $user->name }}
                        </h2>

                        <p class="text-grey-700 dark:text-grey-200 text-sm mt-3">
                            @if($user->bio)
                                {{ $user->bio }}
                            @else
                                <span>No bio added yet</span>
                            @endif
                        </p>

                        <div x-data="{
                                following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                                followersCount: {{ $user->followers()->count() }},
                                follow() {

                                    axios.get('/follow/{{ $user->id }}')
                                        .then(res => {
                                            console.log(res.data);
                                            this.following = !this.following;
                                            this.followersCount = res.data.followersCount;
                                        })
                                        .catch(err => {
                                            console.log(err);
                                        });
                                }
                        }">
                            <span class="mt-2 text-sm text-blue-700">
                                <span x-text="followersCount"></span> Followers
                            </span>

                            @if(auth()->user() && auth()->user()->id !== $user->id)
                                <div class="mt-4">
                                    <button @click="follow()"
                                            x-text="following ? 'Unfollow' : 'Follow'"
                                            :class="{'bg-blue-600 hover:bg-blue-700': following, 'bg-gray-400 hover:bg-gray-500': !following}"
                                            class="px-6 py-2 text-white text-sm font-medium rounded-full shadow-sm transition duration-150">
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>

                {{-- Right: User's Posts --}}
                <div class="md:col-span-2 bg-white dark:bg-gray-800 shadow sm:rounded-lg p-4 sm:p-5">
                    {{-- User Name --}}
                    <h1 class="text-3xl sm:text-4xl font-semibold text-blue-600 dark:text-blue-400 mb-4">
                        {{ $user->name }}
                    </h1>

                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Previous Posts
                    </h2>

                    <div class="space-y-3">
                        @forelse($posts as $post)
                            @php
                                $post_size = str_word_count($post->description);
                                $read_time = number_format($post_size / 150, 2);
                            @endphp
                            <x-post-item :post="$post"/>
                        @empty
                            <div class="flex justify-center items-center py-8">
                                <p class="text-gray-500 dark:text-gray-400 text-sm">No Post Uploaded</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="flex justify-center mt-6">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
