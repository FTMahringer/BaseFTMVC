document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('burger');
    const navbarMenu = document.getElementById('navbarMenu');

    burger.addEventListener('click', () => {
        const isActive = navbarMenu.classList.toggle('active');
        burger.classList.toggle('open');

        // Toggle aria-expanded for accessibility
        burger.setAttribute('aria-expanded', isActive ? 'true' : 'false');
    });
});