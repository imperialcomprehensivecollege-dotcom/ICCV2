<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- About Section -->
            <div>
                <h3 class="text-xl font-bold font-heading mb-4 text-blue-400">About School</h3>
                <p class="text-gray-400">Providing quality education and developing young minds for a brighter future.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold font-heading mb-4 text-blue-400">Quick Links</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About</a></li>
                    <li><a href="{{ route('academics') }}" class="hover:text-white transition">Academics</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>

            <!-- Academics -->
            <div>
                <h3 class="text-xl font-bold font-heading mb-4 text-blue-400">Academics</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white transition">Programs</a></li>
                    <li><a href="#" class="hover:text-white transition">Curriculum</a></li>
                    <li><a href="#" class="hover:text-white transition">Activities</a></li>
                    <li><a href="{{ route('admissions.index') }}" class="hover:text-white transition">Apply Now</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-bold font-heading mb-4 text-blue-400">Contact</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><span class="text-white">Phone:</span> +1 (555) 123-4567</li>
                    <li><span class="text-white">Email:</span> info@school.local</li>
                    <li><span class="text-white">Address:</span> 123 Education Street</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">&copy; 2024 Primary School. All rights reserved.</p>
                <div class="flex space-x-6 text-gray-400">
                    <a href="#" class="hover:text-white transition">Facebook</a>
                    <a href="#" class="hover:text-white transition">Twitter</a>
                    <a href="#" class="hover:text-white transition">Instagram</a>
                </div>
            </div>
        </div>
    </div>
</footer>
