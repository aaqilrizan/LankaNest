<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LankaNest</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Meow+Script&family=Tagesschrift&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'meow': ['Meow Script', 'cursive'],
                        'tagesschrift': ['Tagesschrift', 'sans-serif'],
                        'oswald': ['Oswald', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 font-sans antialiased">
<header>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-lg font-tagesschrift">LankaNest</a>
            <ul class="flex space-x-4 font-oswald">
                <li><a href="{{ url('/login') }}" class="text-white hover:text-gray-400">Login</a></li>
                <li><a href="{{ url('/register') }}" class="text-white hover:text-gray-400">Register</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/welcome_hero.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto h-full flex flex-col items-center justify-center text-center relative z-10">
            <h1 class="text-white text-8xl font-meow">Welcome to LankaNest</h1>
            <p class="text-white text-3xl">Trusted Agents Provide Best Home</p>
        </div>
    </div>

    <section class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-oswald mb-8">Our Services</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <!-- Service 1 -->
                <div class="w-64 bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-110">
                    <img src="{{ asset('images/real_estate_agents_icon.png') }}" alt="Real Estate Agents" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-xl font-oswald mb-2 text-gray-900 dark:text-white">Real Estate Agents</h3>
                    <p class="text-gray-600 dark:text-gray-300">Professional agents to help you find your dream home.</p>
                </div>

                <!-- Service 2 -->
                <div class="w-64 bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-110">
                    <img src="{{ asset('images/properties_icon.png') }}" alt="Properties" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-xl font-oswald mb-2 text-gray-900 dark:text-white">Properties</h3>
                    <p class="text-gray-600 dark:text-gray-300">Wide range of properties to suit your needs and budget.</p>
                </div>

                <!-- Service 3 -->
                <div class="w-64 bg-white dark:bg-gray-700 shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-110">
                    <img src="{{ asset('images/registration_assistance_icon.png') }}" alt="Registration Assistance" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-xl font-oswald mb-2 text-gray-900 dark:text-white">Registration Assistance</h3>
                    <p class="text-gray-600 dark:text-gray-300">Guidance through the registration process with ease.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} LankaNest. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
