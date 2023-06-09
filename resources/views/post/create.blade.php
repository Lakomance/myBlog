@extends('layouts.template')
@section('main')
    <form action="{{ route('post.store') }}" method="post">
        <div class="container">
            <div class="row">
                <div class="mb-3 ml-3 w-50">
                    <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 20px;"> Контент </h3>
                        </div>

                        <div class="card-body">
                            <textarea id="summernote"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="category">Категория: </label>
                <select class="js-example-basic-single w-50" style="height: 75%" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="tags">Теги</label>
                <select class="js-example-basic-multiple w-50" name="tags[]" id="tags" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-outline-info mb-5" type="submit">Создать пост</button>
        </div>
    </form>
@endsection
