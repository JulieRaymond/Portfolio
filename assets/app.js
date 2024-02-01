import './bootstrap.js';
import './styles/app.css';
AOS.init();

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    let navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    //  Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    }

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

document.addEventListener("DOMContentLoaded", function () {
    // Filtre les projets au chargement de la page
    filterProjects('all');

    // Ajoute un gestionnaire d'événement aux boutons de filtrage
    document.querySelectorAll('#portfolio .btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            // Retire la classe active de tous les boutons
            document.querySelectorAll('#portfolio .btn').forEach(function (btn) {
                btn.classList.remove('active');
            });

            // Ajoute la classe active au bouton cliqué
            btn.classList.add('active');

            // Filtre les projets en fonction de la technologie sélectionnée
            filterProjects(btn.getAttribute('data-filter'));
        });
    });

    // Fonction pour filtrer les projets
    function filterProjects(category) {
        document.querySelectorAll('#portfolio-items .col-lg-4').forEach(function (item) {
            let categories = item.getAttribute('data-categories').split(' ');
            if (category === 'all' || categories.includes(category)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
});
