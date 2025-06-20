<ul class="flex flex-wrap -mb-px text-sm font-medium text-center justify-center" id="default-styled-tab" role="tablist">
    <li class="me-2">
        <a href="#" class="inline-block p-4 border-b-2 rounded-t-lg text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500" aria-current="page">
            All Category
        </a>
    </li>

    @forelse($categories as $index => $category)
        <li class="me-2">
            <a href="#" class="inline-block p-4 border-b-2 rounded-t-lg
                text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300
                dark:text-gray-400 dark:hover:text-gray-300 dark:border-gray-700">
                {{ $category->name }}
            </a>
        </li>
    @empty
        {{ $slot }}
    @endforelse
</ul>
