<nav class="sticky top-0 z-50 bg-white shadow-md" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 font-heading">
                    Primary School
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">About</a>
                <a href="{{ route('academics') }}" class="text-gray-700 hover:text-blue-600 transition">Academics</a>
                <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-blue-600 transition">News</a>
                <a href="{{ route('gallery.index') }}" class="text-gray-700 hover:text-blue-600 transition">Gallery</a>
                <a href="{{ route('admissions.index') }}" class="text-gray-700 hover:text-blue-600 transition">Admissions</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
            </div>

            <!-- Mobile menu button -->
            <button @click="open = !open" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" class="md:hidden pb-4 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">About</a>
            <a href="{{ route('academics') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">Academics</a>
            <a href="{{ route('blog.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">News</a>
            <a href="{{ route('gallery.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">Gallery</a>
            <a href="{{ route('admissions.index') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">Admissions</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-gray-700 hover:bg-blue-100">Contact</a>
        </div>
    </div>
</nav>
