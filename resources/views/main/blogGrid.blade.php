@extends('layouts.template')
@section('main')
    <main class="blog-grid-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp"></h1>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="blog-post-card wow fadeInUp">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ Storage::url($post->preview_image) }}" alt="blog">
                            </div>
                            <p class="blog-post-date">{{ $post->updated_at }}</p>
                            <p class="blog-post-wrapper text-muted">{{ $post->category->title }}</p>
                            <h5 class="blog-post-title">{{ $post->title }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 pb-5 mb-5">
                        <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">
                            <a href="#" class="active">01</a>
                            <a href="#">02</a>
                            <a href="#">03</a>
                            <a href="#" class="next">&rarr;</a>
                        </nav>
                </div>
            </div>
        </div>
    </main>
@endsection
