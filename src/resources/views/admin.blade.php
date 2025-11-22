@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-buttons')
    <!-- ログアウト処理 -->
    <form action="/logout" method="POST" >
        @csrf
        <button class="header__btn" type="submit">logout</button>
    </form>
@endsection

@section('content')
@include('modal-detail')
    <div class="page__title-content">
        <h2 class="page__title">Admin</h2>
    </div>

    <!-- 検索機能の処理部分のブロック -->
    <div class="admin-content">
        <section class="admin-search">
            <form class="admin-search__form" action="/admin/search" method="GET">
                <div class="admin-search__row">
                    <!-- 名前、メールアドレス入力での検索 -->
                    <div class="admin-search__item admin-search__item--wide">
                        <input class="admin-search__input" type="text" name="keyword"
                        placeholder="名前やメールアドレスを入力してください"
                        value="{{ request('keyword') }}">
                    </div>

                    <!-- 性別選択での検索 -->
                    <div class="admin-search__item">
                        <select class="admin-search__select" name="gender">
                            <option value="">性別</option>
                            <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                            <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                            <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>

                    <!-- お問合せの種類選択での検索 -->
                    <div class="admin-search__item">
                        <select class="admin-search__select" name="category_id">
                            <option value="">お問い合わせの種類</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 日付での検索 -->
                    <div class="admin-search__item admin-search__item--date">
                        <input class="admin-search__date" type="date" name="date"
                        value="{{ request('date') }}">
                    </div>

                    <!-- 検索実行とリセット -->
                    <div class="admin-search__actions">
                        <button class="admin-search__button admin-search__button--search" type="submit">
                            検索
                        </button>
                        <a class="admin-search__button admin-search__button--reset" href="/admin/reset">
                            リセット
                        </a>
                    </div>
                </div>
            </form>
        </section>

        <!-- エクスポートとページネーションの横列 -->
        <section class="admin-tools">
            <div class="admin-tools__inner">
                <!-- 検索してエクスポートした時検索結果だけ出力 -->
                <div class="admin-export">
                        <a href="{{ url('/admin/export?' . http_build_query(request()->query())) }}" class="admin-export__button">エクスポート</a>
                </div>

                <div class="admin-tools__pagination">
                    <div class="admin-list__pagination">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </section>

    <!-- 一覧テーブル -->
    <section class="admin-list">
        <!-- 文字で表示するための処理 -->
        @php
            $genderLabels = [
                1 => '男性',
                2 => '女性',
                3 => 'その他',
            ];
        @endphp

        <table class="admin-table">
            <thead class="admin-table__head">
                <tr class="admin-table__row admin-table__row--head">
                    <th class="admin-table__cell admin-table__cell--head">お名前</th>
                    <th class="admin-table__cell admin-table__cell--head">性別</th>
                    <th class="admin-table__cell admin-table__cell--head">メールアドレス</th>
                    <th class="admin-table__cell admin-table__cell--head">お問い合わせの種類</th>
                    <th class="admin-table__cell admin-table__cell--head admin-table__cell--action"></th>
                </tr>
            </thead>

            <tbody class="admin-table__body">
                @forelse ($contacts as $contact)
                    <tr class="admin-table__row">
                        <td class="admin-table__cell">
                            {{ $contact->last_name }}　{{ $contact->first_name }}
                        </td>
                        <td class="admin-table__cell">
                            {{ $genderLabels[$contact->gender] ?? '' }}
                        </td>
                        <td class="admin-table__cell">
                            {{ $contact->email }}
                        </td>
                        <td class="admin-table__cell">
                            {{ optional($contact->category)->content ?? '' }}
                        </td>
                        <td class="admin-table__cell admin-table__cell--action">
                            <!-- 一モーダル表示用 -->
                            <button
                                type="button"
                                class="admin-table__detail-button detail-btn"
                                data-id="{{ $contact->id }}"
                                data-name="{{ $contact->last_name }}　{{ $contact->first_name }}"
                                data-gender="{{ $genderLabels[$contact->gender] ?? '' }}"
                                data-email="{{ $contact->email }}"
                                data-tel="{{ $contact->tel }}"
                                data-address="{{ $contact->address }}"
                                data-building="{{ $contact->building }}"
                                data-category="{{ optional($contact->category)->content ?? '' }}"
                                data-detail="{{ $contact->detail }}"
                            >
                                詳細
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="admin-table__row--empty">
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/admin.js') }}"></script>
@endsection