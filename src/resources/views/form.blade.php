<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <h1>Contact</h1>

    <form action="/confirm" method="POST">
    @csrf

    <div>
        <label>お名前</label>
        <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
        <input type="text" name="first_name" placeholder="名:太郎" value="{{ old('first_name') }}">

        <div class="form__error">
            @error('last_name')
                <div>{{ $message }}</div>
            @enderror
            @error('first_name')
                <div>{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div>
        <label>性別</label>
        <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} > 男性
        <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性
        <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他
        @error('gender')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>メールアドレス</label>
        <input type="email" name="email" placeholder="名:test@example.com" value="{{ old('email') }}">
        @error('email')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>電話番号</label>
        <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}"> -
        <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}"> -
        <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
        <div class="form__error">
        {{-- 電話番号のいずれかにエラーがあれば1つだけ出す --}}
        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
            <div>{{ $errors->first('tel1') ?: $errors->first('tel2') ?: $errors->first('tel3') }}</div>
        @endif
        </div>
    </div>

    <div>
        <label>住所</label>
        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
        @error('address')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>建物名</label>
        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
    </div>

    <div>
        <label>お問い合わせの種類</label>
        <select name="category_id">
            <option value="">選択してください</option>
            <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
            <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
            <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
            <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
            <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
        </select>
        @error('category_id')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>お問い合わせ内容</label>
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        @error('detail')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">確認画面へ</button>
</form>
</body>
</html>