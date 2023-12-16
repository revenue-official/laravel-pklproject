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
        btndarkmode.checked = true;
        wavePath.setAttribute("fill", "#1f2937");
    }

    function disableDarkMode() {
        localStorage.setItem('darkMode', 'false');
        document.body.classList.remove("dark");
        moonIcon.classList.add('hidden');
        sunIcon.classList.remove('hidden');
        btndarkmode.checked = false;
        wavePath.setAttribute("fill", "#fff");
    }


}
darkMode();
