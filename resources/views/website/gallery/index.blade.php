@extends('website.layout')

@section('title', 'Gallery - Primary School')
@section('meta_description', 'Explore our school gallery with photos from various activities and events')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">School Gallery</h1>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $gallery)
            <a href="{{ route('gallery.show', $gallery->slug) }}" class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="aspect-square bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-center p-6">
                    <div>
                        <h3 class="text-2xl font-bold font-heading mb-2">{{ $gallery->title }}</h3>
                        <p class="text-sm opacity-90">{{ $gallery->images->count() }} photos</p>
                    </div>
                </div>
                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition"></div>
            </a>
            @empty
            <p class="text-gray-600">No galleries found.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
