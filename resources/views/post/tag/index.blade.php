@extends('layouts.template')
@section('main')
    <div class="container">
        <h2 class="text-muted mb-4">Тег: {{ $tag->title }}</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="card mb-5 mr-5 ml-3" style="width: 18rem;">
                    <img src="{{ Storage::url($post->preview_image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">Перейти к посту</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
