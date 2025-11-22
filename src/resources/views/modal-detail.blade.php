{{-- adminの記載が多くなるためモーダル用のHTMLは別に作成しました --}}
{{-- id = ''　にてJSからモーダルに表示されるデータを取得 --}}

<div class="modal modal--hidden" id="detail-modal">
    <div class="modal__content">
        <button type="button" class="modal__close" id="detail-modal-close">×</button>
        <div class="modal__row">
            <div class="modal__label">お名前</div>
            <div class="modal__value" id="modal-name"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">性別</div>
            <div class="modal__value" id="modal-gender"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">メールアドレス</div>
            <div class="modal__value" id="modal-email"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">電話番号</div>
            <div class="modal__value" id="modal-tel"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">住所</div>
            <div class="modal__value" id="modal-address"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">建物名</div>
            <div class="modal__value" id="modal-building"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">お問い合わせの種類</div>
            <div class="modal__value" id="modal-category"></div>
        </div>

        <div class="modal__row">
            <div class="modal__label">お問い合わせ内容</div>
            <div class="modal__value modal__value--multiline" id="modal-detail"></div>
        </div>

        <form class="modal__delete-form" action="/admin/delete" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" id="modal-contact-id">
            <button type="submit" class="modal__delete-button">削除</button>
        </form>
    </div>
</div>