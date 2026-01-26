document.addEventListener('DOMContentLoaded', function () {
    const overlay = document.getElementById('global-popup-overlay');
    const closeBtn = document.getElementById('popup-close');

    if (overlay) {
        setTimeout(() => {
            overlay.classList.add('show');
        }, 500);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            overlay.classList.remove('show');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) {
                overlay.classList.remove('show');
            }
        });
    }
});
