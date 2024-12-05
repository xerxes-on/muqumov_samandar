<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Blog') }}</title>
    <link rel="icon" href="./icon.svg" type="image">
    {{--    @vite('resources/css/app.css')--}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body
    class="h-full relative font-fira-code bg-gradient-to-b from-white to-gray-100 dark:from-black dark:to-black transition-colors duration-900 dark:bg-black flex flex-col">
<x-navbar :settings="$settings"/>

<main class="flex-grow">
    @yield('content')
</main>

<footer class="w-screen flex items-center mb-4 justify-center">
        <span class="text-sm dark:text-gray-800 text-gray-700">
            Made with 🤍 by <a href="https://xerxes.uz" class="hover:underline">xerxes.uz</a>
        </span>
</footer>
<script>
    if (localStorage.getItem('darkMode') === 'true' ||
        (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        document.getElementById('lightIcon').classList.add('hidden');
        document.getElementById('darkIcon').classList.remove('hidden');
    }

    // Toggle dark mode and save preference
    document.getElementById('darkModeToggle').addEventListener('click', function () {
        const isDarkMode = document.documentElement.classList.toggle('dark');
        localStorage.setItem('darkMode', isDarkMode);

        // Toggle icons
        document.getElementById('lightIcon').classList.toggle('hidden', isDarkMode);
        document.getElementById('darkIcon').classList.toggle('hidden', !isDarkMode);
    });
</script>


@yield('scripts')
<script>
    (async () => {
        await loadFireflyPreset(tsParticles);

        await tsParticles.load({
            id: "tsparticles",
            options: {
                preset: "firefly",
            },
        });
    })();
</script>
</body>
</html>



