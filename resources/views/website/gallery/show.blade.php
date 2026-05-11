@extends('website.layout')

@section('title', $gallery->title . ' - Gallery')
@section('meta_description', $gallery->description ?? 'View gallery')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">{{ $gallery->title }}</h1>
        @if($gallery->description)
        <p class="mt-4 text-blue-100">{{ $gallery->description }}</p>
        @endif
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($gallery->images as $image)
            <div class="aspect-square rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition bg-gray-200">
                <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                    @if($image->getImageUrl())
                    <img src="{{ $image->getImageUrl() }}" alt="{{ $image->title }}" class="w-full h-full object-cover">
                    @else
                    <div class="text-center text-gray-500">
                        <p>{{ $image->title ?? 'Photo' }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-gray-600">No images in this gallery.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
