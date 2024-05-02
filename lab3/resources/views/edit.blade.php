@extends('layouts.app')
@section('body')
    <div class="container mt-5">
        <h2>Edit Post</h2>
        <form method="post" action="{{ route('posts.update', $post->id) }}" >
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $post['title'] }}">
            </div>
            <div class="form-group mt-3">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body">{{ $post['body'] }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label for="body">Creator</label>
                <select class="form-control" name="creator" value="{{ $post['creator'] }}">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" value="{{ $post['image'] }}">
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection