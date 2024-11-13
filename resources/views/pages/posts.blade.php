@extends('components.layout')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-center flex-col items-center">
        <h1 class="text-4xl py-10 text-center font-bold text-gray-800 dark:text-gray-100 mb-4">Blog</h1>
        @forelse($blogs as $blog)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-6 md:w-2/3">
                <a href="/blog/{{$blog->id}}">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $blog->title }}
                        </h2>
                        <p class="text-gray-700 dark:text-gray-300 mt-2 text-sm">
                            {{ Str::limit($blog->body, 150) }} <!-- limit to 150 characters -->
                        </p>
                        <div class="flex items-center justify-between mt-4">
                    <span class="text-gray-500 dark:text-gray-400 text-xs">
                        {{ $blog->created_at->format('M d, Y') }}
                    </span>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path
                                        d="M3.172 5.172a4 4 0 015.656 0l.172.172.172-.172a4 4 0 115.656 5.656L10 14.828l-4.828-4.828a4 4 0 010-5.656z"/>
                                </svg>
                                <span class="ml-1 text-gray-600 dark:text-gray-300 text-sm">{{ $blog->likes }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-gray-700 dark:text-gray-300 text-center">No blogs found.</p>
        @endforelse

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
