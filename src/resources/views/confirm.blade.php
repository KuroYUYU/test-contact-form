@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    @php
    //性別を文字で表示するための処理
    $gender = [
        '1' => '男性',
        '2' => '女性',
        '3' => 'その他',
    ];
    //カテゴリの種類を文字で表示するための処理
    $category = [
        '1' => '商品のお届けについて',
        '2' => '商品の交換について',
        '3' => '商品トラブル',
        '4' => 'ショップへのお問い合わせ',
        '5' => 'その他',
    ];
    @endphp

    <div class="page__title-content">
        <h2 class="page__title">Confirm</h2>
    </div>

    <!-- 確認内容表示部分 -->
    <div class="confirm-table__wrapper">
        <table class="confirm-table">
            <tr class="confirm-table__row">
                <th class="confirm-table__head">お名前</th>
                <td class="confirm-table__data">
                    {{ $inputs['last_name'] . '　' . $inputs['first_name'] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">性別</th>
                <td class="confirm-table__data">
                    {{ $gender[$inputs['gender']] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">メールアドレス</th>
                <td class="confirm-table__data">
                    {{ $inputs['email'] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">電話番号</th>
                <td class="confirm-table__data">
                    {{ $inputs['tel1'] . $inputs['tel2'] . $inputs['tel3'] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">住所</th>
                <td class="confirm-table__data">
                    {{ $inputs['address'] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">建物名</th>
                <td class="confirm-table__data">
                    {{ $inputs['building'] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">お問い合わせの種類</th>
                <td class="confirm-table__data">
                    {{ $category[$inputs['category_id']] }}
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__head">お問い合わせ内容</th>
                <td class="confirm-table__data confirm-table__data--multiline">
                    {!! nl2br(e($inputs['detail'])) !!}
                </td>
            </tr>
        </table>
    </div>

    <!-- 送信と修正 -->
    <form action="/send" method="POST">
        @csrf
        @foreach($inputs as $name => $value)
            <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach

        <div class="contact-form__button">
            <button type="submit" name="action" value="submit" class="contact-form__submit">送信</button>
            <button type="submit" name="action" value="back" class="contact-form__submit contact-form__submit--secondary">修正</button>
        </div>
    </form>
@endsection