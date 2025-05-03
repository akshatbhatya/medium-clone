<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Premium Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 font-serif">
    <!-- Header -->
    <header class="border-b border-gray-200 bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-5 flex justify-between items-center">
            <div class="text-3xl font-extrabold text-gray-900 tracking-tight">Premium Blog</div>
            <nav class="space-x-8">
                <a href="#" class="text-gray-700 hover:text-green-800 transition duration-200">Home</a>
                <a href="#" class="text-gray-700 hover:text-green-800 transition duration-200">Stories</a>
                <a href="#" class="text-gray-700 hover:text-green-800 transition duration-200">About</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-800 transition duration-200">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-800 transition duration-200">Sign In</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-green-800 transition duration-200">Create Account</a>
                    <a href="{{ route('register') }}" class="bg-green-700 text-white px-5 py-2 rounded-full hover:bg-green-800 transition duration-200">Get Started</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="max-w-6xl mx-auto px-6 py-20 bg-gradient-to-r from-green-50 to-gray-50">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 leading-tight mb-6 tracking-tight">
            Unlock a World of Thoughtful Stories
        </h1>
        <p class="text-2xl text-gray-700 mb-10 max-w-2xl">
            Join a community of curious minds and explore premium content crafted with depth and elegance.
        </p>
        <a href="#" class="bg-green-700 text-white px-8 py-3 rounded-full hover:bg-green-800 transition duration-300 shadow-md">Start Reading</a>
    </section>

    <!-- Featured Content -->
    <section class="max-w-6xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Article Card 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-56 bg-gradient-to-br from-gray-200 to-green-100"></div> <!-- Placeholder gradient -->
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-3">The Art of Simplicity</h2>
                    <p class="text-gray-600 mb-4">A deep dive into living with less and loving it more.</p>
                    <div class="text-sm text-gray-500">May 3, 2025 • 5 min read</div>
                </div>
            </div>
            <!-- Article Card 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-56 bg-gradient-to-br from-gray-200 to-green-100"></div>
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-3">Exploring the Cosmos</h2>
                    <p class="text-gray-600 mb-4">What we’ve learned from the stars so far.</p>
                    <div class="text-sm text-gray-500">May 3, 2025 • 7 min read</div>
                </div>
            </div>
            <!-- Article Card 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-56 bg-gradient-to-br from-gray-200 to-green-100"></div>
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-3">Code & Creativity</h2>
                    <p class="text-gray-600 mb-4">How programming fuels artistic expression.</p>
                    <div class="text-sm text-gray-500">May 3, 2025 • 6 min read</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-10">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p class="text-sm">© 2025 Premium Blog. All rights reserved.</p>
            <div class="mt-4 space-x-6">
                <a href="#" class="hover:text-green-400 transition duration-200">Terms</a>
                <a href="#" class="hover:text-green-400 transition duration-200">Privacy</a>
                <a href="#" class="hover:text-green-400 transition duration-200">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>