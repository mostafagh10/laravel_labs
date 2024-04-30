@extends('layouts.app')

@section('body')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                {{ $post['title'] }}
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post['body'] }}</p>
                <p class="card-text">by : {{ $post['creator'] }}</p>
                <!-- <img src="{{ asset('images/' . $post['image']) }}" alt="{{ $post['title'] }}" class="img-fluid"> -->
            </div>
            <div class="card-footer">
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to All Posts</a>
                <a class="btn btn-danger" href="{{ route('posts.destroy',$post['id']) }}">
                    Delete Post
                  </a>

                  <a class="btn btn-warning" href="{{ route('posts.edit',$post['id']) }}">
                    update Post
                  </a>
            </div>
        </div>
    </div>
@endsection