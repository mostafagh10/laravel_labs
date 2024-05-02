@extends('layouts.app')
@section('body')
    <div class="container mt-5">
        <h1>All Posts</h1>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- <img src="{{ asset('images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}"> -->

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text">created at : {{ $post->created_at->format('Y-m-d') }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">View Post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item {{ $posts->previousPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                <li class="page-item {{ $i === $posts->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item {{ $posts->nextPageUrl() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

    </div>
@endsection
