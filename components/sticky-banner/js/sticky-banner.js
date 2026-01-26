document.addEventListener('DOMContentLoaded', function () {
    const stickyBlock = document.querySelector('.sticky-block');
    const closeBtn = document.querySelector('.sticky-block__close');

    if (stickyBlock && closeBtn) {
        setTimeout(() => {
            stickyBlock.classList.add('active');
        }, 500);

        closeBtn.addEventListener('click', () => {
            stickyBlock.classList.add('closed');
        });
    }
});
