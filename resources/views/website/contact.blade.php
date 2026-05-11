@extends('website.layout')

@section('title', 'Contact Us - Primary School')
@section('meta_description', 'Get in touch with Primary School - Contact information and form')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">Contact Us</h1>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold font-heading mb-6">Send us a Message</h2>

                @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold mb-2">Name</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('name') }}">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('email') }}">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-semibold mb-2">Phone (Optional)</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('phone') }}">
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-semibold mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('subject') }}">
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-semibold mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold font-heading mb-6">Contact Information</h2>

                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-2 flex items-center">
                                <span class="text-2xl mr-3">📍</span> Address
                            </h3>
                            <p class="text-gray-600">123 Education Street<br>Your City, State 12345<br>Country</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2 flex items-center">
                                <span class="text-2xl mr-3">📞</span> Phone
                            </h3>
                            <p class="text-gray-600">+1 (555) 123-4567<br>+1 (555) 123-4568</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2 flex items-center">
                                <span class="text-2xl mr-3">✉️</span> Email
                            </h3>
                            <p class="text-gray-600">info@primaryschool.local<br>admissions@primaryschool.local</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-2 flex items-center">
                                <span class="text-2xl mr-3">⏰</span> Office Hours
                            </h3>
                            <p class="text-gray-600">Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="bg-blue-600 text-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold font-heading mb-4">Follow Us</h2>
                    <div class="flex gap-4">
                        <a href="#" class="hover:opacity-80 transition">Facebook</a>
                        <a href="#" class="hover:opacity-80 transition">Twitter</a>
                        <a href="#" class="hover:opacity-80 transition">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
