@extends('website.layout')

@section('title', 'Home - Primary School')
@section('meta_description', 'Welcome to Primary School - Building Bright Futures')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold font-heading mb-4">Welcome to Our School</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Building Bright Futures Through Quality Education</p>
            <a href="{{ route('admissions.index') }}" class="inline-block bg-yellow-400 text-blue-900 px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition">
                Apply Now
            </a>
        </div>
    </div>
</div>

<!-- Why Choose Us -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold font-heading text-center mb-12">Why Choose Us</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-4xl font-bold text-blue-600 mb-4">🎓</div>
                <h3 class="text-xl font-bold font-heading mb-3">Expert Faculty</h3>
                <p class="text-gray-600">Our dedicated teachers provide quality education with personalized attention to each student.</p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-4xl font-bold text-blue-600 mb-4">🏆</div>
                <h3 class="text-xl font-bold font-heading mb-3">Excellence</h3>
                <p class="text-gray-600">We maintain high academic standards while fostering creativity and critical thinking skills.</p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-4xl font-bold text-blue-600 mb-4">🤝</div>
                <h3 class="text-xl font-bold font-heading mb-3">Community</h3>
                <p class="text-gray-600">We believe in creating a supportive environment for students, parents, and teachers.</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-5xl font-bold text-blue-600 font-heading mb-2">25+</div>
                <p class="text-gray-600">Years of Excellence</p>
            </div>
            <div>
                <div class="text-5xl font-bold text-blue-600 font-heading mb-2">1500+</div>
                <p class="text-gray-600">Students Enrolled</p>
            </div>
            <div>
                <div class="text-5xl font-bold text-blue-600 font-heading mb-2">90+</div>
                <p class="text-gray-600">Qualified Teachers</p>
            </div>
            <div>
                <div class="text-5xl font-bold text-blue-600 font-heading mb-2">98%</div>
                <p class="text-gray-600">Success Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured News -->
@if($featuredPosts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold font-heading mb-12">Latest News</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredPosts as $post)
            <article class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                <div class="h-48 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                <div class="p-6">
                    <p class="text-sm text-blue-600 font-semibold mb-2">{{ $post->category->name ?? 'Uncategorized' }}</p>
                    <h3 class="text-xl font-bold font-heading mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($post->excerpt ?? $post->content, 100) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Read More →
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('blog.index') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                View All News
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Banner -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold font-heading mb-4">Ready to Join Our Community?</h2>
        <p class="text-xl mb-8 opacity-90">Start your journey towards academic excellence today</p>
        <a href="{{ route('admissions.index') }}" class="inline-block bg-yellow-400 text-blue-900 px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition">
            Begin Your Application
        </a>
    </div>
</section>
@endsection
