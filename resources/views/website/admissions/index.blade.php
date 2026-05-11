@extends('website.layout')

@section('title', 'Admissions - Primary School')
@section('meta_description', 'Apply to Primary School - Admissions information and online application')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">Admissions</h1>
        <p class="mt-4 text-blue-100">Join our community of learners and achieve excellence</p>
    </div>
</div>

<div class="py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
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

        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold font-heading mb-6">Application Form</h2>

            <form action="{{ route('admissions.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="student_name" class="block text-sm font-semibold mb-2">Student Name</label>
                        <input type="text" id="student_name" name="student_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('student_name') }}">
                    </div>
                    <div>
                        <label for="date_of_birth" class="block text-sm font-semibold mb-2">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('date_of_birth') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-semibold mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="grade_applying" class="block text-sm font-semibold mb-2">Grade Applying For</label>
                    <select id="grade_applying" name="grade_applying" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="">Select a grade</option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-sm font-semibold mb-2">Additional Information</label>
                    <textarea id="message" name="message" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('message') }}</textarea>
                </div>

                <h3 class="text-xl font-bold font-heading mb-6 mt-8">Parent Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="parent_name" class="block text-sm font-semibold mb-2">Parent Name</label>
                        <input type="text" id="parent_name" name="parent_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('parent_name') }}">
                    </div>
                    <div>
                        <label for="parent_email" class="block text-sm font-semibold mb-2">Parent Email</label>
                        <input type="email" id="parent_email" name="parent_email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('parent_email') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="parent_phone" class="block text-sm font-semibold mb-2">Parent Phone</label>
                        <input type="tel" id="parent_phone" name="parent_phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('parent_phone') }}">
                    </div>
                    <div>
                        <label for="parent_address" class="block text-sm font-semibold mb-2">Parent Address</label>
                        <input type="text" id="parent_address" name="parent_address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" value="{{ old('parent_address') }}">
                    </div>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="flex-1 bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                        Submit Application
                    </button>
                    <a href="{{ route('home') }}" class="flex-1 border-2 border-blue-600 text-blue-600 px-8 py-3 rounded-lg font-bold hover:bg-blue-50 transition text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
