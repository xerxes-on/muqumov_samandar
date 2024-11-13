@extends('components.layout')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-center flex-col items-center">
        <h1 class="text-4xl py-10 text-center font-bold text-gray-800 dark:text-gray-100 mb-4">Talks</h1>
        @forelse($talks as $talk)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-6 md:w-2/3">
                <a href="{{ $talk->you_tube_link }}" target="_blank"
                   class="text-blue-600 hover:cursor-pointer hover:bg-black dark:text-blue-400 mt-2">
                    <div class="p-4 flex items-center space-x-4">
                        <!-- Image Thumbnail -->
                        <div class="flex-shrink-0">
                            <img src="{{ Storage::url($talk->image) }}" alt="{{ $talk->title }}" width="200px"
                                 class=" object-cover rounded-lg">
                        </div>
                        <div>
                            <!-- Talk Title and YouTube Link -->
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $talk->title }}
                            </h2>
                            <p class="text-sm text-gray-500 opacity-30 dark:text-white">
                                {{ $talk->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        @empty
            <p class="text-gray-700 dark:text-gray-300 text-center">No talks found.</p>
        @endforelse

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $talks->links() }}
        </div>
    </div>
@endsection
