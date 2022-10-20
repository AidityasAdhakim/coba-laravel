@extends('layouts.main')

@section('container')

    <h1 class="text-center mb-3">{{ $title }}</h1>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="/blog">
          @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Post"
            name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit" >Search</button>
          </div>
        </form>
      </div>
    </div>

    <h5>
        <a href="/categories">Categories</a>
    </h5>
    
    @if ($post->count())
    <div class="card mb-3">
      @if ($post[0]->image)
          <div style="max-height: 350px; overflow:hidden;">
            <img src="{{ asset('storage/'.$post[0]->image) }}" class="img-fluid" alt="{{ $post[0]->category->name }}">
          </div>
      @else
        <img src="https://source.unsplash.com/1200x400/?{{ $post[0]->category->name }}" class="card-img-top" alt="PostImage">
      @endif

        
        <div class="card-body text-center">
          <h5 class="card-title"><a class="text-dark" href="/blog/{{ $post[0]->slug }}"> {{ $post[0]->title }}</a></h5>
          <small class="text-muted">
          <p>
            By <a href="/blog?author={{ $post[0]->author->username }}">{{ $post[0]->author->name }}</a>, Category : <a href="/blog?category={{ $post[0]->category->slug }}">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}
        </p>
        </small>
          <p class="card-text">{{ $post[0]->excerpt }}</p>

        <a href="/blog/{{ $post[0]->slug }}" class="btn btn-primary">Read More</a>

        </div>
    </div>


    <div class="container">
        <div class="row">
            @foreach ($post->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card" >
                    {{-- Category name --}}
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a class="text-white text-decoration-none" href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                    
                    @if ($post->image)
                        <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                    @else
                    <img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" class="card-img-top" alt="post-image">
                    @endif

                    <div class="card-body">
                      <h5 class="card-title"><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
                      <p>
                        By <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>{{ $post->created_at->diffForHumans() }}
                    </p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center fs-4">No Post Found.</p>
        @endif
    </div>

    <div class="d-flex justify-content-left">
    {{-- {{ $post->links() }} --}}
  </div>

@endsection