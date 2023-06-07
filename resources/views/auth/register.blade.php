@extends('layouts.template')
@section('main')
    <div class="container mb-5">
        <div class="row ml-5">
            <div class="col ml-5">
                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf

                    <div class="w-50 mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Имя..." required>
                        @error('name')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-50 mb-3">
                        <label for="email" class="form-label">Email (Логин) </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
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

                    <div class="w-50 mb-3">
                        <label for="password" class="form-label">Подтвердите пароль</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Подтвердите пароль..." required>
                        @error('password_confirmation')
                        <div class="mt-3 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Регистрация</button>
                </form>
            </div>

            <div class="col">
                <img src="{{ asset('assets/images/Auth/auth.png') }}" alt="IMG" class="w-75">
            </div>
        </div>
    </div>
@endsection
