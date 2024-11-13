<nav class="sticky top-0 z-50 bg-white dark:bg-black border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ $settings->app_name }}
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/blog" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Blog</a>
                <a href="/talks" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Talks</a>
                <a href="{{$settings->channel_url}}" target="_blank" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Channel</a>
                <button id="darkModeToggle" class="p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <svg id="lightIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg id="darkIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

