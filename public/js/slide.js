const sliding = document.querySelector('.slide-left');
window.addEventListener('scroll', () => {
    const {scrollTop, clientHeight} = document.documentElement;
    const topToTop = sliding.getBoundingClientRect().top;
    if( scrollTop > (scrollTop + topToTop) - clientHeight * 0.5){
        sliding.classList.add('active');
    }
})