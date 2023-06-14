@extends('layouts.template')
@section('main')
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="container">
            <div class="row">
                <div class="mb-3 ml-3 w-50">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 20px;"> Контент </h3>
                        </div>
                        <div class="card-body">
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                        </div>
                    </div>
                    @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="preview_image">Превью</label>
                <input class="" type="file" name="preview_image" id="preview_image">
                <i class="fa fa-fw fa-camera"></i>
                @error('preview_image')
                <div class="mt-3 alert alert-danger">{{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category">Категория: </label>
                <select class="js-example-basic-single w-50" style="height: 75%" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $post->category_id == $category->id ? ' selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="tags">Теги</label>
                <select class="js-example-basic-multiple w-50" name="tags[]" id="tags" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                        @foreach($post->tags as $postTag)
                            {{ $tag->id == $postTag->id ? ' selected' : '' }}
                        @endforeach
                            >{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-outline-info mb-5" type="submit">Сохранить изменения</button>
            <form method="post" action="{{ route('post.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger mb-5 ml-3" type="submit">Удалить пост</button>
            </form>
        </div>
    </form>
@endsection
