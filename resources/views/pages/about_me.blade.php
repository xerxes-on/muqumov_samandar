@extends('components.layout')
@section('content')
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
            <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-12">
                    ABOUT ME
                </h1>

                <!-- Main Content -->
                <div class="space-y-8">
                    <!-- Introduction -->
                    <p class="text-lg text-gray-700 dark:text-gray-300">{!!   $settings->about_me  !!}</p>
                </div>
            </div>
        </div>
@endsection


