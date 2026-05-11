@extends('website.layout')

@section('title', 'News & Blog - Primary School')
@section('meta_description', 'Stay updated with the latest news from Primary School')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">News & Updates</h1>
    </div>
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Posts -->
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($posts as $post)
                    <article class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                        <div class="h-40 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                        <div class="p-6">
                            <p class="text-sm text-blue-600 font-semibold mb-2">{{ $post->category->name }}</p>
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
                    <p class="text-gray-600">No posts found.</p>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-20">
                    <h3 class="text-xl font-bold font-heading mb-4">Categories</h3>
                    <ul class="space-y-2">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('blog.category', $category->slug) }}" class="text-blue-600 hover:text-blue-800">
                                {{ $category->name }} <span class="text-gray-400">({{ $category->posts_count }})</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
