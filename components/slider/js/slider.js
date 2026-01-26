import Swiper from 'swiper';
import {Navigation, Pagination} from 'swiper/modules';
import 'swiper/swiper-bundle.css'

document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('.my-swiper');
    if (!slider) return;

    new Swiper(slider, {
        modules: [Navigation, Pagination],

        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
