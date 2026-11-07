/*========== menu icon navbar ==========*/
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

/*========== scroll sections active link ==========*/
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {


    /*========== sticky navbar ==========*/
    let header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 100);

}
    /*========== remove menu icon navbar when click navbar link (scroll) ==========*/
menuIcon.classList.remove('bx-x');
navbar.classList.remove('active');




/*========== scroll reveal ==========*/
ScrollReveal({ 
    rest: true,
    distance: '80px',
    duration: 2000,
    delay: 200
 });
 ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });

 ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });
ScrollReveal().reveal('.home-img img, .services-container, .portfolio-box, .testimonial-wrapper, .contact form', { origin: 'bottom' });
ScrollReveal().reveal('.home-content h1, .about-img img', { origin: 'left' });
ScrollReveal().reveal('.home-content h3, .home-content p, .about-content', { origin: 'right' });

/*========== certificate viewer ==========*/
const lightbox = document.querySelector('#lightbox');

if (lightbox) {
    const lightboxImg = lightbox.querySelector('img');
    const lightboxTitle = lightbox.querySelector('.lightbox-title');

    const closeLightbox = () => {
        lightbox.classList.remove('open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    document.querySelectorAll('.certificate-box').forEach(box => {
        box.querySelector('.certificate-img').addEventListener('click', () => {
            const img = box.querySelector('img');
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt;
            lightboxTitle.textContent = box.querySelector('figcaption').textContent;
            lightbox.classList.add('open');
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        });
    });

    lightbox.addEventListener('click', e => {
        if (e.target === lightbox || e.target.classList.contains('lightbox-close')) closeLightbox();
    });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeLightbox();
    });
}