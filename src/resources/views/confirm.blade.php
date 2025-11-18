<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>confirm</h1>

    @php
    $gender = [
        '1' => '男性',
        '2' => '女性',
        '3' => 'その他',
    ];
    
    $category = [
        '1' => '商品のお届けについて',
        '2' => '商品の交換について',
        '3' => '商品トラブル',
        '4' => 'ショップへのお問い合わせ',
        '5' => 'その他',
    ];
    @endphp

    <div>
        お名前：{{ ($inputs['last_name']).'　'. ($inputs['first_name']) }}<br>
        性別：{{ $gender[$inputs['gender']] }}<br>
        メールアドレス：{{ $inputs['email'] }}<br>
        電話番号：
        {{ ($inputs['tel1']) . ($inputs['tel2']) . ($inputs['tel3']) }}<br>
        住所：{{ $inputs['address']}}<br>
        建物名：{{ $inputs['building']}}<br>
        お問い合わせの種類：{{ $category[$inputs['category_id']]}}<br>
        お問い合わせ内容：<br>
        {!! nl2br(e($inputs['detail'])) !!}
    </div>

    <form action="/send" method="POST">
        @csrf
        @foreach($inputs as $name => $value)
            <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach

        <button type="submit" name="action" value="submit">送信</button>
        <button type="submit" name="action" value="back">修正</button>
    </form>
</body>
</html>