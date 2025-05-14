<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LankaNest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Meow+Script&family=Tagesschrift&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
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
<body class="bg-gray-100">
    <header>
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="#" class="text-white text-lg font-tagesschrift">LankaNest</a>
                <ul class="flex space-x-4 font-oswald">
                    <li><a href="{{ url('/admin/home') }}" class="text-white hover:text-gray-400">Users</a></li>
                    <li><a href="{{ url('/admin/properties') }}" class="text-white hover:text-gray-400">Properties</a></li>
                    <li><a href="{{ url('/logout') }}" class="text-white hover:text-gray-400">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p class="font-oswald">© 2023 LankaNest. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>