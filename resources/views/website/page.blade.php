@extends('website.layout')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description ?? $page->description)
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
<div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold font-heading">{{ $page->title }}</h1>
    </div>
</div>

<div class="py-12 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endsection
