@extends('layouts.template')
@section('main')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="{{ route('profile.index') }}"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Назад к профилю</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>Мои посты</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Мои комментарии</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <form class="form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded">
                                                    <img src="{{ $user->picture ? Storage::url($user->picture) : asset('assets/images/Profile/default.png') }}" width="150">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $user->name }}</h4>
                                                <p class="mb-0 text-muted">{{ $user->email }}</p>
                                                <div class="mt-2">
                                                    <input class="" type="file" name="picture">
                                                    <i class="fa fa-fw fa-camera"></i>
                                                </div>
                                                @error('picture')
                                                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <div class="text-muted"><small>Joined {{ $user->created_at->format('d M Y') }}</small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Настройки профиля</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Полное имя</label>
                                                                    <input class="form-control" type="text" name="name" placeholder="John Smith" value="{{ $user->name }}">
                                                                    @error('name')
                                                                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Город</label>
                                                                    <input class="form-control" type="text" name="city" value="{{ $user->city }}">
                                                                    @error('city')
                                                                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="text" placeholder="user@example.com" name="email" value="{{ $user->email }}">
                                                                    @error('email')
                                                                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label>Обо мне</label>
                                                                    <textarea class="form-control" name="about_me" rows="5">{{ $user->about_me }}</textarea>
                                                                    @error('about_me')
                                                                    <div class="mt-3 alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="mb-2"><b>Сменить пароль</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Текущий пароль</label>
                                                                    <input class="form-control" type="password" name="password">
                                                                </div>
                                                                @error('password')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Новый пароль</label>
                                                                    <input class="form-control" type="password" name="new_password">
                                                                </div>
                                                                @error('new_password')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Повторите <span class="d-none d-xl-inline">Пароль</span></label>
                                                                    <input class="form-control" type="password" name="new_password_confirmation">
                                                                </div>
                                                                @error('new_password_confirmation')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-info" type="submit">Сохранить изменения</button>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-block btn-secondary">
                                            <i class="fa fa-sign-out"></i>
                                            <span>Выйти</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
