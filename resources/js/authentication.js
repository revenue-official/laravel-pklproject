import "./bootstrap";
import 'remixicon/fonts/remixicon.css';
import { gsap } from "gsap";

// GSAP ANIMATION 
gsap.from(".elastic-down", {
    y: -100,
    opacity: 0,
    duration: 1,
    ease: "elastic",
    delay: 0.5
})



// kode darkmode
const darkModeToggle = document.getElementById('darkModeToggle');
const htmlElement = document.getElementById('htmlElement');
const isDarkMode = localStorage.getItem('darkMode') === 'true';

if (isDarkMode) {
    enableDarkMode();
} else {
    disableDarkMode();
}

darkModeToggle.addEventListener('change', () => {
    if (darkModeToggle.checked) {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});

function enableDarkMode() {
    localStorage.setItem('darkMode', 'true');
    htmlElement.classList.add('dark');
    // Ubah ikon menjadi matahari saat dalam dark mode
    document.querySelector('.ri-sun-line').style.display = 'none';
    document.querySelector('.ri-moon-line').style.display = 'inline';
}

function disableDarkMode() {
    localStorage.setItem('darkMode', 'false');
    htmlElement.classList.remove('dark');
    // Ubah ikon menjadi bulan saat dalam light mode
    document.querySelector('.ri-moon-line').style.display = 'none';
    document.querySelector('.ri-sun-line').style.display = 'inline';
}


// SHOW/HIDE PASSWORD EYE BUTTON
const eyeButtons = document.querySelectorAll('.ri-eye-off-line');
eyeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const passwordInput = button.parentElement.querySelector('input[id="password"]');
        let isPasswordVisible = (passwordInput.type === 'text');

        if (isPasswordVisible) {
            button.classList.remove('ri-eye-line');
            button.classList.add('ri-eye-off-line');
            passwordInput.type = 'password';
        } else {
            button.classList.remove('ri-eye-off-line');
            button.classList.add('ri-eye-line');
            passwordInput.type = 'text';
        }
    });
});
