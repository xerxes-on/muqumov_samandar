@extends('components.layout')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 ">
        <div class="bg-white dark:bg-black rounded-lg shadow-md overflow-hidden mb-6 flex items-center justify-center">
            <div class="p-4 ">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">{{ $blog->title }}</h1>
                <p class="text-gray-700 dark:text-gray-300 text-sm mb-6">{{ $blog->created_at->format('M d, Y') }}</p>

                <div class="text-gray-800 dark:text-gray-200 mb-6 flex items-center justify-center">
                    {{ $blog->body }}
                </div>

                <div class="flex items-center justify-end">
                    <!-- Like Button -->
                    <form action="{{ route('blogs.toggleLike', $blog->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 {{ $isLiked ? 'text-red-500' : 'text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3.172 5.172a4 4 0 015.656 0l.172.172.172-.172a4 4 0 115.656 5.656L10 14.828l-4.828-4.828a4 4 0 010-5.656z" />
                            </svg>
                        </button>
                    </form>
                    <span class="ml-1 text-gray-600 dark:text-gray-300">{{ $blog->likes }}</span>

                </div>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="flex justify-between mt-6">
            @if ($previous = \App\Models\Post::where('id', '<', $blog->id)->orderBy('id', 'desc')->first())
                <a href="{{ route('blogs.show', $previous->id) }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                    &larr; Previous
                </a>
            @else
                <span></span>
            @endif

            @if ($next = \App\Models\Post::where('id', '>', $blog->id)->orderBy('id')->first())
                <a href="{{ route('blogs.show', $next->id) }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                    Next &rarr;
                </a>
            @else
                <span></span>
            @endif
        </div>
    </div>
@endsection
