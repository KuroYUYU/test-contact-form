@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
    <div class="contact">
        <div class="page__title-content">
            <h2 class="page__title">Contact</h2>
        </div>

        <form class="contact-form" action="/confirm" method="POST">
        @csrf
            {{-- 名前の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    お名前 <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__inputs">
                        {{-- 姓 --}}
                        <div class="contact-form__input-wrapper">
                            <input type="text" name="last_name" class="contact-form__input" placeholder="例:山田" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="contact-form__error">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- 名 --}}
                        <div class="contact-form__input-wrapper">
                            <input type="text" name="first_name" class="contact-form__input" placeholder="例:太郎" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="contact-form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- 性別の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    性別 <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__inputs">
                        <label class="contact-form__radio">
                            <input type="radio" name="gender" value="1" {{ old('gender')=='1' ? 'checked' : '' }}>
                            男性
                        </label>
                        <label class="contact-form__radio">
                            <input type="radio" name="gender" value="2" {{ old('gender')=='2' ? 'checked' : '' }}>
                            女性
                        </label>
                        <label class="contact-form__radio">
                            <input type="radio" name="gender" value="3" {{ old('gender')=='3' ? 'checked' : '' }}>
                            その他
                        </label>
                    </div>
                    @error('gender')
                        <div class="contact-form__error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- emailの入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    メールアドレス <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__input-wrapper">
                        <input type="text" name="email" class="contact-form__input" placeholder="例: test@example.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="contact-form__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 電話番号の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    電話番号 <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__inputs contact-form__inputs--tel">
                        <div class="contact-form__input-wrapper">
                            <input type="text" name="tel1" class="contact-form__input" placeholder="080" value="{{ old('tel1') }}">
                            @error('tel1')
                                <div class="contact-form__error">{{ $message }}</div>
                            @enderror
                        </div>
                        <span class="tel-dash">-</span>
                        <div class="contact-form__input-wrapper">
                            <input type="text" name="tel2" class="contact-form__input" placeholder="1234" value="{{ old('tel2') }}">
                            @error('tel2')
                                <div class="contact-form__error">{{ $message }}</div>
                            @enderror
                        </div>
                        <span class="tel-dash">-</span>
                        <div class="contact-form__input-wrapper">
                            <input type="text" name="tel3" class="contact-form__input" placeholder="5678" value="{{ old('tel3') }}">
                            @error('tel3')
                                <div class="contact-form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- 住所の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    住所 <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__input-wrapper">
                        <input type="text" name="address" class="contact-form__input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        @error('address')
                            <div class="contact-form__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 建物名の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">建物名</label>
                <div class="contact-form__field">
                    <div class="contact-form__input-wrapper">
                        <input type="text" name="building" class="contact-form__input" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </div>
                </div>
            </div>

            {{-- お問い合わせの種類の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    お問い合わせの種類 <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__input-wrapper">
                        <select name="category_id" class="contact-form__select">
                            <option value="">選択してください</option>
                            <option value="1" {{ old('category_id')=='1' ? 'selected' : '' }}>商品のお届けについて</option>
                            <option value="2" {{ old('category_id')=='2' ? 'selected' : '' }}>商品の交換について</option>
                            <option value="3" {{ old('category_id')=='3' ? 'selected' : '' }}>商品トラブル</option>
                            <option value="4" {{ old('category_id')=='4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                            <option value="5" {{ old('category_id')=='5' ? 'selected' : '' }}>その他</option>
                        </select>
                        @error('category_id')
                            <div class="contact-form__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- お問い合わせ内容の入力部分 --}}
            <div class="contact-form__group">
                <label class="contact-form__label">
                    お問い合わせ内容 <span class="required">※</span>
                </label>
                <div class="contact-form__field">
                    <div class="contact-form__input-wrapper">
                        <textarea name="detail" class="contact-form__textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        @error('detail')
                            <div class="contact-form__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 確認ボタン --}}
            <div class="contact-form__button">
                <button type="submit" class="contact-form__submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection