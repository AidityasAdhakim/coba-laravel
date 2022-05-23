@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>    

    <h2 class="mt-3">{{ $post->title }}</h2>
    <p>By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">

    <article class="my-3 fs-5">
    {!! $post->body !!}
    </article>
    <a href="/blog" class="mt-3">Back</a>
@endsection