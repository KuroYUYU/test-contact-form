@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-buttons')
    <a href="/login" class="header__btn header__btn--link">login</a>
@endsection

@section('body-class','bg-auth')
@section('content')
    <div class="page__title-content">
        <h2 class="page__title">Register</h2>
    </div>

	<!-- ユーザ登録情報入力 -->
	<form class="form" method="POST" action="{{ route('register') }}">
		@csrf
		<div class="form__group">
			<div class="form__group-title">
				<span class="form__label--item">お名前</span>
			</div>
			<div class="form__group-content">
				<div class="form__input--text">
					<input type="text" name="name" value="{{ old('name') }}" placeholder="例:山田　太郎"/>
				</div>
				<div class="form__error">
					@error('name')
						{{ $message }}
					@enderror
				</div>
			</div>
		</div>

		<div class="form__group">
			<div class="form__group-title">
				<span class="form__label--item">メールアドレス</span>
			</div>
			<div class="form__group-content">
				<div class="form__input--text">
					{{-- emailだとブラウザ標準のバリデーションPUが出てしまうためtextを指定 --}}
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

		<!-- 登録の実行 -->
		<div class="form__button">
			<button class="form__button-submit" type="submit">登録</button>
		</div>
	</form>
@endsection