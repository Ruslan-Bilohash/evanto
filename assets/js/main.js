// Universal Lending PRO v1.0 — Main JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // AOS Animation
    AOS.init({ once: true, duration: 800 });

    // Preloader
    const preloader = document.getElementById('preloader');
    window.addEventListener('load', () => {
        preloader.style.opacity = '0';
        setTimeout(() => preloader.style.display = 'none', 600);
    });

    // Back to top button
    const backToTop = document.createElement('button');
    backToTop.innerHTML = `<i class="fa-solid fa-arrow-up"></i>`;
    backToTop.className = `hidden fixed bottom-8 right-8 bg-emerald-600 text-white w-14 h-14 rounded-2xl shadow-2xl items-center justify-center text-2xl z-50 hover:bg-emerald-700 transition`;
    backToTop.onclick = () => window.scrollTo({top: 0, behavior: 'smooth'});
    document.body.appendChild(backToTop);

    window.addEventListener('scroll', () => {
        backToTop.classList.toggle('hidden', window.scrollY < 500);
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if (this.getAttribute('href') !== '#') {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Language dropdown
    window.toggleLang = function() {
        document.getElementById('langDropdown').classList.toggle('hidden');
    };

    // Mobile menu
    window.toggleMobileMenu = function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    };

    // Close dropdown on outside click
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            const dropdown = document.getElementById('langDropdown');
            if (dropdown) dropdown.classList.add('hidden');
        }
    });
});
