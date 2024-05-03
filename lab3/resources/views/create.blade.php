@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Create a New Post</h2>
        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter post title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" placeholder="Enter post content"></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="body">creator</label>
                <select class="form-control" name="creator">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div> -->
            <div class="form-group">
                <label for="image">Image</label>
                <!-- <input type="file" class="form-control" name="image" id="image"> -->
                <input type="file" class="form-control" name="image" id="image" placeholder="Enter post image">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Post</button>
        </form>
    </div>
@endsection