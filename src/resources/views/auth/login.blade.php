@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-buttons')
    <a href="/register" class="header__btn header__btn--link">register</a>
@endsection

@section('body-class','bg-auth')
@section('content')
    <div class="login-form__content">
        <div class="page__title-content">
            <h2 class="page__title">Login</h2>
        </div>

        <!-- ログイン情報入力部 -->
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="例:test@example.com"/>
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="password" name="password" placeholder="例:coachtech1106"/>
                    </div>
                    <div class="form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <!-- ログイン実行 -->
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection