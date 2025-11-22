document.addEventListener('DOMContentLoaded', function () {
    const modal          = document.getElementById('detail-modal');
    const closeBtn       = document.getElementById('detail-modal-close');

    const modalName      = document.getElementById('modal-name');
    const modalGender    = document.getElementById('modal-gender');
    const modalEmail     = document.getElementById('modal-email');
    const modalTel       = document.getElementById('modal-tel');
    const modalAddress   = document.getElementById('modal-address');
    const modalBuilding  = document.getElementById('modal-building');
    const modalCategory  = document.getElementById('modal-category');
    const modalDetail    = document.getElementById('modal-detail');
    const modalContactId = document.getElementById('modal-contact-id');

    document.querySelectorAll('.detail-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            // 表示用の値一覧
            modalName.textContent     = this.dataset.name   || '';
            modalGender.textContent   = this.dataset.gender || '';
            modalEmail.textContent    = this.dataset.email  || '';
            modalTel.textContent      = this.dataset.tel    || '';
            modalAddress.textContent  = this.dataset.address || '';
            modalBuilding.textContent = this.dataset.building || '';
            modalCategory.textContent = this.dataset.category || '';
            modalDetail.textContent   = this.dataset.detail || '';

            //   データ削除の際、hiddenのvalueにdata-idを入れる処理
            if (modalContactId) {
                modalContactId.value = this.dataset.id || '';
            }

            modal.classList.remove('modal--hidden');
        });
    });

    function closeModal() {
        modal.classList.add('modal--hidden');
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
});