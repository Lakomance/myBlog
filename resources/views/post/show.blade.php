@extends('layouts.template')
@section('main')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <p class="post-date">{{ $post->updated_at }}</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        {!! $post->content !!}
                    </div>
                    <div class="post-tags wow fadeInUp">
                        @foreach($post->tags as $postTag)
                            <a href="#" class="post-tag">{{ $postTag->title }}</a>
                        @endforeach
                    </div>
                    <div class="post-navigation wow fadeInUp">
                        <button class="btn prev-post"> Предыдущий пост </button>
                            <a class="btn" href="{{ route('post.edit', $post->id) }}"> Редактировать пост </a>
                        <button class="btn next-post"> Следующий пост </button>
                    </div>
                    <div class="comment-section wow fadeInUp">
                        <h5 class="section-title">Оставьте комментарий</h5>
                        <form method="POST" class="oleez-comment-form">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="message">*Сообщение</label>
                                    <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Теги</h5>
                        <div class="widget-content">
                            @foreach($tags as $tag)
                                <a href="#" class="post-tag">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Похожее</h5>
                        <div class="widget-content">
                            <div class="gallery">
                                @foreach($posts as $eachPost)
                                    @if($eachPost->category->title == $post->category->title && $eachPost->id != $post->id)
                                        <a href="{{ route('post.show', $eachPost->id) }}" class="gallery-grid-item" data-fancybox="widget-gallery"></a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Категории</h5>
                        <div class="widget-content">
                            <ul class="category-list">
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <section style="width: 100%">
                    <h4 class="mb-4">Комментарии</h4>
                    <div class="row d-flex justify-content-center">
                        <div class="card text-dark" style="width: 100%">
                            @foreach($post->comments as $postComment)
                                <div class="card-body p-4">
                                    <br>
                                    <div class="d-flex flex-start">
                                        <img class="rounded-circle shadow-1-strong me-3 mr-3"
                                             src="{{ $postComment->user->picture ? Storage::url($postComment->user->picture) : asset('assets/images/Profile/default.png') }}" alt="avatar" width="60"
                                             height="60" />
                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $postComment->user->name }}</h6>
                                            <div class="d-flex align-items-center mb-3">
                                                <p class="mb-0"> {{ $postComment->updated_at }} </p>
                                                <a href="#" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                                <a href="#" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                                <a href="#" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                            </div>
                                            <p class="mb-0"> {{ $postComment->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
