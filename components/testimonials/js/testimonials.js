import Swiper from 'swiper';
import {Navigation, Pagination} from 'swiper/modules';
import 'swiper/swiper-bundle.css'

document.addEventListener('DOMContentLoaded', () => {
    const testimonialsSwiperEl = document.querySelector('.testimonials-swiper');
    if (!testimonialsSwiperEl) return;

    new Swiper(testimonialsSwiperEl, {
        modules: [Navigation, Pagination],
        effect: 'slide',
        loop: true,
        spaceBetween: 24,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
});
