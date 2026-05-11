@extends('website.layout')

@section('title', $category->meta_title ?? $category->name . ' - News')
@section('meta_description', $category->meta_description ?? '')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">{{ $category->name }}</h1>
        @if($category->description)
        <p class="mt-4 text-blue-100">{{ $category->description }}</p>
        @endif
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                <div class="h-40 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                <div class="p-6">
                    <h3 class="text-lg font-bold font-heading mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->excerpt ?? $post->content, 80) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">{{ $post->published_at->format('M d, Y') }}</span>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                            Read More
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <p class="text-gray-600">No posts found in this category.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
