document.addEventListener('DOMContentLoaded', function () {
    const tocToggles = document.querySelectorAll('.sc-toc-toggle');
    tocToggles.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const parent = btn.closest('.sc-toc-chips-wrapper');
            if (parent) {
                parent.classList.toggle('collapsed');
                if (parent.classList.contains('collapsed')) {
                    btn.textContent = '[Розгорнути]';
                } else {
                    btn.textContent = '[Згорнути]';
                }
            }
        });
    });
});
