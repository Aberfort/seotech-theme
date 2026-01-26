document.addEventListener('DOMContentLoaded', function(){
    const faqAccordion = document.getElementById('faqAccordion');
    if (!faqAccordion) return;

    const faqItems = faqAccordion.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const header = item.querySelector('.faq-item__header');
        if (!header) return;

        header.addEventListener('click', () => {
            item.classList.toggle('faq-item--open');
        });
    });
});
