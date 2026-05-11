@extends('website.layout')

@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description ?? $post->excerpt)
@section('meta_keywords', $post->meta_keywords ?? '')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-blue-200 mb-2">{{ $post->category->name }}</p>
        <h1 class="text-4xl font-bold font-heading">{{ $post->title }}</h1>
        <p class="mt-4 text-blue-100">By {{ $post->author->name }} • {{ $post->published_at->format('F d, Y') }}</p>
    </div>
</div>

<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="prose prose-lg max-w-none mb-12">
            {!! $post->content !!}
        </article>

        <!-- Tags -->
        @if($post->tags->count() > 0)
        <div class="border-t border-b py-4 mb-8">
            <p class="font-semibold mb-2">Tags:</p>
            <div class="flex flex-wrap gap-2">
                @foreach($post->tags as $tag)
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $tag->tag }}</span>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
        <div class="mt-12">
            <h3 class="text-2xl font-bold font-heading mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                <article class="bg-white rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="h-32 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                    <div class="p-4">
                        <h4 class="font-bold font-heading mb-2">{{ Str::limit($related->title, 50) }}</h4>
                        <a href="{{ route('blog.show', $related->slug) }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                            Read More
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
