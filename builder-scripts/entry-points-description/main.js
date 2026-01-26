import 'regenerator-runtime/';
import lozad from 'lozad'

import '../../inc/js/analytics';
import { initMobileMenu } from '../../inc/js/mobile-nav';
import '../../inc/js/shortcodes'
import '../../inc/js/add-parent-table'

document.addEventListener('DOMContentLoaded', () => {

    initMobileMenu({
        burgerSelector: '.burger-btn',
        menuSelector: '.mobile-menu',
        overlaySelector: '.mobile-nav-overlay',
        closeSelector: '.mobile-menu__close',
        hasChildrenSelector: '.mobile-menu__list li.menu-item-has-children > a'
    });

});

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();
