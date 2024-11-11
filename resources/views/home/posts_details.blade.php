@extends('home.layouts')
<base href="/public">
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Post Image -->
                @if ($post->image)
                    <img src="{{ asset('images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="width: 100%; height: auto;">
                @else
                    <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Default Image" style="width: 100%; height: auto;">
                @endif

                <div class="card-body">
                    <!-- Post Title -->
                    <h1 class="card-title">{{ $post->title }}</h1>

                    <!-- Post Meta Information -->
                    <p class="card-text">
                        <small class="text-muted">Posted by: <strong>{{ $post->name }}</strong></small><br>
                    </p>

                    <!-- Post Description -->
                    <p class="card-text mt-4">
                        {{ $post->description }}
                    </p>

                    <!-- Back to Posts Button -->
                    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
