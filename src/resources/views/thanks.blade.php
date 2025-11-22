@extends('layouts.app')

{{-- thanksページは下記読み込みでheaderを非表示 --}}
@section('hide-header',true)

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content-wrapper">
        <div class="thanks__content">
            <h2 class="thanks__message">お問い合わせありがとうございました</h2>
        </div>
        <div class="home__button">
            <a class="home__button-submit" href="/">HOME</a>
        </div>
    </div>
@endsection