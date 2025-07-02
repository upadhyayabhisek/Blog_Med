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
                @if($post->user->image)
                    <img
                        src="{{ Storage::url($post->user->image) }}"
                        alt="Author Image"
                        class="w-12 h-12 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105"
                    >
                @else
                    <img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIf4R5qPKHPNMyAqV-FjS_OTBB8pfUV29Phg&s"
                        alt="Default Author Image"
                        class="w-12 h-12 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600 transform transition-transform duration-300 hover:scale-105"
                    >
                @endif
                <span class="font-semibold text-gray-900">
                    <a href="{{ route('profile.show', $post->user->username) }}">
                        Posted by {{ $post->user->name }}
                    </a>
                </span>
            </div>

            <div style="margin-bottom: 1rem; color: #4b5563; font-size: 1rem; margin-top: 50px">
                {{ Str::words($post->description, 20) }}
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
