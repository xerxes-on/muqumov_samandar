@extends('components.layout')
@section('content')
    <div  id="tsparticles" class="fixed inset-0 -z-10"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <div class="relative w-32 h-32 mx-auto mb-8">
                <img
                    src="{{ asset('storage/images/'.$settings->main_image)}}"
                    alt="Profile"
                    class="rounded-full object-cover w-full h-full border-4 border-white dark:border-gray-800 shadow-lg"
                >
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">{{$settings->name}}</h1>
            <p class="text-xl text-gray-400 mb-6">{{$settings->title}}</p>
            <p class="text-gray-400 mb-8">{{$settings->description}}</p>

            <div class="flex justify-center space-x-4 mb-8">
                @foreach ($links as $key => $url)
                    @if (!empty($url))
                        <a href="{{ $url }}" target="_blank" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                            {!! $icons[$key] !!}
                        </a>
                    @endif
                @endforeach
            </div>

            <div class="flex justify-center space-x-4">
                <a href="/blog" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Read Blog
                </a>
                <a href="/about" class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-base font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">
                    About Me
                </a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/preset-firefly@3/tsparticles.preset.firefly.bundle.min.js"></script>
@endsection
