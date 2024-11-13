<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Blog') }}</title>
    @vite('resources/css/app.css')
</head>
<body
    class="h-full font-fira-code bg-gradient-to-b from-white to-gray-100 dark:from-black dark:to-black transition-colors duration-900">
    <x-navbar :settings="$settings"/>
<main>
    @yield('content')
</main>
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



