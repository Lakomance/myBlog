@extends('layouts.template')
@section('main')
<div class="container mb-5">
    <div class="row ml-5">
        <div class="col ml-5 mt-5">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="w-50 mb-3">
                    <label for="email" class="form-label">Логин</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Логин..." required>
                    @error('email')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-50 mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Пароль..." required>
                    @error('password')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary mr-3">Войти</button> <br> <br>
                <span class="text-muted mr-1">Нет аккаунта?</span> <a href="{{ route('auth.register') }}" class="btn btn-outline-info">Зарегистрироваться</a>
            </form>
        </div>

        <div class="col">
            <img src="{{ asset('assets/images/Auth/auth.png') }}" alt="IMG" class="w-75">
        </div>
    </div>
</div>
@endsection
