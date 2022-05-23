@extends('layouts.main')

@section('container')

    <h1>{{ $title }}</h1>
    <h5>
        <a href="/categories">Categories</a>
    </h5>
    
    @if ($post->count())
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400/?{{ $post[0]->category->name }}" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title"><a class="text-dark" href="/blog/{{ $post[0]->slug }}"> {{ $post[0]->title }}</a></h5>
          <small class="text-muted">
          <p>
            By <a href="/authors/{{ $post[0]->author->username }}">{{ $post[0]->author->name }}</a>, Category : <a href="/categories/{{ $post[0]->category->slug }}">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}
        </p>
        </small>
          <p class="card-text">{{ $post[0]->excerpt }}</p>

        <a href="/blog/{{ $post[0]->slug }}" class="btn btn-primary">Read More</a>

        </div>
    </div>
    @else
    <p class="text-center fs-4">No Post Found.</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($post->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card" >
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-white text-decoration-none" href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                    <img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" class="card-img-top" alt="post-image">
                    <div class="card-body">
                      <h5 class="card-title"><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
                      <p>
                        By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>{{ $post->created_at->diffForHumans() }}
                    </p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    
    </div>

@endsection