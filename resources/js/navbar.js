import { gsap } from "gsap";

function darkMode() {
    const btndarkmode = document.querySelector("#dark-mode");
    const sunIcon = document.querySelector(".sun-icon");
    const moonIcon = document.querySelector(".moon-icon");
    const wavePath = document.querySelector(".wave-path");
    let isDarkMode = localStorage.getItem('darkMode');

    // get localStorage darkMode
    if (isDarkMode === 'true') {
        enableDarkMode();
    } else if (isDarkMode === 'false') {
        disableDarkMode();
    }

    btndarkmode.addEventListener("change", () => {
        if (btndarkmode.checked === true) {
            enableDarkMode();
        } else if (btndarkmode.checked === false) {
            disableDarkMode();
        }

    })

    function enableDarkMode() {
        localStorage.setItem('darkMode', 'true');
        document.body.classList.add("dark");
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
        // moonIcon.classList.add('moon-neon');
        btndarkmode.checked = true;
        wavePath.setAttribute("fill", "#1f2937");
    }

    function disableDarkMode() {
        localStorage.setItem('darkMode', 'false');
        document.body.classList.remove("dark");
        moonIcon.classList.add('hidden');
        // moonIcon.classList.remove('moon-neon');
        sunIcon.classList.remove('hidden');
        btndarkmode.checked = false;
        wavePath.setAttribute("fill", "#fff");
    }


}
darkMode();


function navbarShowHide() {
    const navbar = document.querySelector(".navbar");
    const navtrigger = document.querySelector(".navbar-trigger");
    let lastScroll = 0;
    let showNavbar = true;

    const handleScroll = () => {
        let currentScroll = window.pageYOffset || window.scrollY;

        if (currentScroll > lastScroll) {
            showNavbar = false;
        } else {
            showNavbar = true;
        }

        lastScroll = currentScroll <= 0 ? 0 : currentScroll;

        if (showNavbar) {
            navbar.classList.add("top-[-7rem]");
        } else {
            navbar.classList.remove("top-[-7rem]");
        }


        navtrigger.addEventListener("mouseenter", () => {
            navbar.classList.remove("top-[-7rem]");
        });
    }

    window.addEventListener("scroll", handleScroll);
}

navbarShowHide();


function listNavHandler() {
    const listElements = document.querySelectorAll('.nav-list');
    const popups = document.querySelectorAll('.popup');
    let timeoutIds = [];

    function handleHover(index) {
        return () => {
            timeoutIds[index] = setTimeout(() => {
                listElements[index].classList.add('relative');
                popups[index].classList.add('top-6', 'left-[-1rem]');
                popups[index].classList.remove('hidden');
            }, 500);
        };
    }

    function handleMouseLeave(index) {
        return () => {
            clearTimeout(timeoutIds[index]);
            popups[index].classList.add('hidden');
            popups[index].classList.remove('top-6', 'left-[-1rem]');
        };
    }

    listElements.forEach((element, index) => {
        element.addEventListener('mouseenter', handleHover(index));
        element.addEventListener('mouseleave', handleMouseLeave(index));
    });
}
listNavHandler();
