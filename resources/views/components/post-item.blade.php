@php
    $defaultImages = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIYYU16HpQLz_WTVKkwSlHPQaSa8NM7hXrOI6XZdjUW1ZkVMkwHY5RhDf0LDe6Qm2tDY8&usqp=CAU",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwaC2JFGV1ztlUeZeuElwPBFz2lJHjuxAn-w&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXYy2wAj-vSX-KOnlhY9iIGTYa-TudJ4bcx4fDnbpWjTpJ3i2WOBm10jr4k4o7t8Q8I28&usqp=CAU",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2zg2x2H1o-uJ-YrksVRUTHWg64r5zr1zQd_x6KN4GL-GCfd0xuyMeqQgNogaaE8hC9CQ&usqp=CAU"
    ];
    $randomDefaultImage = $defaultImages[array_rand($defaultImages)];
@endphp


<div style="
    display: flex;
    max-width: calc(100vw - 450px);
    margin: 0 auto 50px auto;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    height: 350px;
">
    <!-- Fixed-size image -->
    <a href="{{ route('post.show',
            ['username'=>$post->user->username, 'post'=>$post->slug])
        }}" style="flex-shrink: 0;">
        <img
            src="{{Storage::url($post->image)}}"
            alt="Blog Image"
            style="
                width: 450px;
                height: 100%;
                object-fit: cover;
                display: block;
            "
        />
    </a>

    <!-- Content area -->
    <div style="
        flex-grow: 1;
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    ">
        <div>
            <a href="{{ route('post.show',
            ['username'=>$post->user->username, 'post'=>$post->slug])
        }}" style="text-decoration: none;">
                <h5 style="
                    margin-bottom: 0.75rem;
                    font-size: 1.5rem;
                    font-weight: 700;
                    color: #111827;
                ">
                    {{ $post->title }}
                </h5>
            </a>

            <div class="flex items-center gap-4 text-gray-600 text-sm">
                <span class="font-semibold text-blue-500">
                    <a href="{{ route('post.byCategory', $post->category) }}">
                        {{ $post->category ? $post->category->name : 'No Category' }}
                    </a>
                    <span class="text-gray-400">&nbsp•&nbsp</span>
                    <span class="text-gray-900">{{ $post->readTime() }} minute read</span>
                </span>
            </div>

            <div class="flex items-center gap-4 text-gray-600 text-sm mt-5">
                @if($post->user->image)
                    <a href="{{ route('profile.show', $post->user) }}">
                    <img
                            src="{{ Storage::url($post->user->image) }}"
                            alt="Author Image"
                            class="w-12 h-12 rounded-full object-cover border-2 border-blue-500 dark:border-blue-700 transform transition-transform duration-300 hover:scale-105"
                        />
                    </a>
                @else
                    <a href="{{ route('profile.show', $post->user) }}">
                        <img
                            src="{{$randomDefaultImage}}"
                            alt="Default Author Image"
                            class="w-12 h-12 rounded-full object-cover border-2 border-blue-500 dark:border-blue-700 transform transition-transform duration-300 hover:scale-105"
                        />
                    </a>

                @endif
                <span class="font-semibold text-gray-900">
                    <a href="{{ route('post.show',
                        ['username'=>$post->user->username, 'post'=>$post->slug])
                    }}">
                        Posted by {{ $post->user->name }}
                    </a>
                </span>
            </div>

            <div style="margin-bottom: 1rem; color: #4b5563; font-size: 1rem; margin-top: 25px; text-align: justify;">
                {{ Str::words($post->description, 30) }}
            </div>

        </div>

        <!-- Read More Button -->
        <a href="{{ route('post.show',
            ['username'=>$post->user->username, 'post'=>$post->slug])
        }}">
            <x-primary-button>Read More
                <svg style="width: 1rem; height: 1rem; margin-left: 0.5rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </x-primary-button>
        </a>
    </div>
</div>
