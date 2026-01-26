// mobile-menu.js

/**
 * Ініціалізує мобільне меню: бургер, оверлей, кнопка закриття, сабменю.
 * @param {Object} options
 * @param {string} options.burgerSelector - селектор для кнопки бургера
 * @param {string} options.menuSelector - селектор для контейнера .mobile-menu
 * @param {string} options.overlaySelector - селектор для оверлея
 * @param {string} options.closeSelector - селектор для кнопки закриття
 * @param {string} options.hasChildrenSelector - селектор елементів з сабменю
 */
export function initMobileMenu({
                                   burgerSelector = '.burger-btn',
                                   menuSelector = '.mobile-menu',
                                   overlaySelector = '.mobile-nav-overlay',
                                   closeSelector = '.mobile-menu__close',
                                   hasChildrenSelector = '.mobile-menu__list li.menu-item-has-children > a'
                               } = {}) {

    const burgerBtn = document.querySelector(burgerSelector);
    const mobileMenu = document.querySelector(menuSelector);
    const overlay = document.querySelector(overlaySelector);
    const closeBtn = document.querySelector(closeSelector);

    if (!burgerBtn || !mobileMenu || !overlay || !closeBtn) {
        console.warn('Mobile menu elements not found. Check selectors.');
        return;
    }

    function openMenu() {
        mobileMenu.classList.add('mobile-menu--open');
        overlay.classList.add('mobile-nav-overlay--visible');
    }

    function closeMenu() {
        mobileMenu.classList.remove('mobile-menu--open');
        overlay.classList.remove('mobile-nav-overlay--visible');
    }

    function toggleSubmenu(e) {
        e.preventDefault();

        const clickedLink = e.currentTarget;
        const parentLi = e.currentTarget.closest('li.menu-item-has-children');
        if (!parentLi) return;

        const subMenu = parentLi.querySelector('.sub-menu');
        if (!subMenu) return;

        const isOpen = subMenu.style.display === 'block';
        subMenu.style.display = isOpen ? 'none' : 'block';

        if (isOpen) {
            clickedLink.classList.remove('submenu-trigger--active');
        } else {
            clickedLink.classList.add('submenu-trigger--active');
        }
    }

    burgerBtn.addEventListener('click', openMenu);
    overlay.addEventListener('click', closeMenu);
    closeBtn.addEventListener('click', closeMenu);

    const hasChildrenLinks = document.querySelectorAll(hasChildrenSelector);
    hasChildrenLinks.forEach(link => {
        link.addEventListener('click', toggleSubmenu);
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1025 && mobileMenu.classList.contains('mobile-menu--open')) {
            closeMenu();
        }
    });
}
