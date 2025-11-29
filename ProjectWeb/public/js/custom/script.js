// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.main-nav-bar > ul');
    const navCategory = document.querySelector('.nav-category');

    menuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('show');
    });

    // Handle category dropdown on mobile
    navCategory.addEventListener('click', (e) => {
        if (window.innerWidth <= 700) {
            e.preventDefault();
            navCategory.classList.toggle('active');
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.main-nav-bar')) {
            navMenu.classList.remove('show');
            navCategory.classList.remove('active');
        }
    });

    // Close menu on resize if screen becomes larger than mobile breakpoint
    window.addEventListener('resize', () => {
        if (window.innerWidth > 700) {
            navMenu.classList.remove('show');
            navCategory.classList.remove('active');
        }
    });
});
