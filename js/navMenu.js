const toggleMenu = () => {
    const navButton = document.getElementById('NavMenuMobileButton');
    const navMenuMobile = document.getElementById('NavMenuLinkMobile');
    const navMenuMobileIcon = document.getElementById('NavMenuMobileIcon');
    const navButtonText = document.querySelector('#NavMenuMobileText');

    navButton.addEventListener('click', () => {
        navMenuMobile.classList.toggle('open');
        
        if (navMenuMobile.classList.contains('open')) {
            navMenuMobileIcon.src = "../addons/IconClose.svg";
            navButtonText.innerHTML = "fermer";
        } else {
            navMenuMobileIcon.src = "../addons/IconMenu.svg";
            navButtonText.innerHTML = "menu";
        }
    });
};

window.addEventListener('DOMContentLoaded', toggleMenu);
