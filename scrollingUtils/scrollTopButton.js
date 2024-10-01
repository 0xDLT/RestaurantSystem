const scrollToTopButton = document.getElementById('scrollToTop');

window.addEventListener('scroll', () => {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopButton.classList.remove('hidden');
        scrollToTopButton.classList.add('opacity-100');
    } else {
        scrollToTopButton.classList.add('hidden');
        scrollToTopButton.classList.remove('opacity-100');
    }
});

scrollToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});