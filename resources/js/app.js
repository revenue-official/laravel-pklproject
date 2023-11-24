import "./bootstrap";
import 'remixicon/fonts/remixicon.css';
import { gsap } from "gsap";

// GSAP ANIMATION 



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


// kode navbar scroll 
let lastScrollTop = 0;
const handleScroll = () => {
    const currentScroll = window.scrollY || window.pageYOffset;

    if (currentScroll > lastScrollTop) {
        // Scrolling down
        navbar.classList.add('top-[-5rem]');
    } else {
        // Scrolling up
        navbar.classList.remove('top-[-5rem]');
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
};

window.addEventListener('scroll', handleScroll);

function navProfile() {
    const profileThumbnail = document.getElementById('profileThumbnail');
    const dropMenu = document.getElementById('dropMenu');

    profileThumbnail.addEventListener('click', () => {
        dropMenu.classList.toggle('opacity-100');
    })
}
document.addEventListener('DOMContentLoaded', navProfile);


// Ajax untuk mengirim requestq dan menerima response (Modal Changes)
function modalAdd() {
    const modalOpenButtons = document.querySelector('.open-modal-add')

    modalOpenButtons.addEventListener('click', function() {
        const targetModal = this.getAttribute('data-target');
        const floatingModal = document.getElementById('floatingModal');

        const urlChanges = '/add/' + targetModal;
        fetch(urlChanges)
            .then(response => response.text())
            .then(data => {
                floatingModal.innerHTML = data;

                const modalForm = document.querySelector('.modalFormAll');
                const modalCloseButtons = document.querySelector('.close-modal-add');

                modalCloseButtons.addEventListener('click', function() {
                    modalForm.classList.add('top-[-20rem]', 'duration-500', 'opacity-0');
                    setTimeout(() => {
                        floatingModal.innerHTML = '';
                    }, 300)
                });
            })
            .catch(error => {
                console.error('Terjadi kesalahan saat mengambil form penambahan.');
            });
    });
};
document.addEventListener('DOMContentLoaded', modalAdd);



// Ajax untuk mengirim requestq dan menerima response (Modal Changes)
function modalChanges() {
    const modalOpenButtons = document.querySelectorAll('.open-modal-changes');

    modalOpenButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const asetId = this.getAttribute('data-id');
            const targetModal = this.getAttribute('data-target');
            const floatingModal = document.getElementById('floatingModal');

            const urlChanges = '/edit/' + asetId + '/' + targetModal;
            fetch(urlChanges)
                .then(response => response.text())
                .then(data => {
                    floatingModal.innerHTML = data;

                    const modalForm = document.querySelector('.modalFormAll');
                    const modalCloseButtons = document.querySelector('.close-modal-changes');

                    modalCloseButtons.addEventListener('click', function() {
                        modalForm.classList.add('top-[-10rem]', 'duration-500', 'opacity-0');
                        setTimeout(() => {
                            floatingModal.innerHTML = '';
                        }, 300)
                    });
                })
                .catch(error => {
                    console.error('Terjadi kesalahan saat mengambil form pengeditan.');
                });
        });
    });
};
document.addEventListener('DOMContentLoaded', modalChanges);

// Ajax untuk mengirim requestq dan menerima response (Modal Deleted)
function modalDelete() {
    const modalOpenButtons = document.querySelectorAll('.open-modal-delete');

    modalOpenButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const asetId = this.getAttribute('data-id');
            const targetModal = this.getAttribute('data-target');
            const floatingModal = document.getElementById('floatingModal');

            const urlDelete = '/delete/' + asetId + '/' + targetModal;
            fetch(urlDelete)
                .then(response => response.text())
                .then(data => {
                    floatingModal.innerHTML = data;

                    const modalForm = document.querySelector('.modalFormAll');
                    const modalCloseButtons = document.querySelector('.close-modal-delete');

                    modalCloseButtons.addEventListener('click', function() {
                        modalForm.classList.add('top-[-10rem]', 'duration-500', 'opacity-0');
                        setTimeout(() => {
                            floatingModal.innerHTML = '';
                        }, 300)
                    });
                })
                .catch(error => {
                    console.error('Terjadi kesalahan saat mengambil form penghapusan.');
                });
        });
    });
};
document.addEventListener('DOMContentLoaded', modalDelete);

// fungsi kolom pencarian
function SearchingMethod() {
    const chooseTbody = document.getElementById('chooseTbody');
    const inputSearch = document.querySelector('.inputSearch');
    const categoryItem = document.querySelector('#categoryItem');

    inputSearch.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            const keyword = inputSearch.value;
            const category = categoryItem.value;

            fetch('/searching?query=' + keyword + '&category=' + category)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(function(data) {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data;

                    const newTbody = tempDiv.querySelector('#chooseTbody');
                    chooseTbody.innerHTML = newTbody.innerHTML;

                    const includeScript = document.createElement('script');
                    includeScript.innerHTML = [modalDelete() || modalChanges()];
                    document.body.appendChild(includeScript);

                })
                .catch(function(error) {
                    console.error('There has been a problem with your fetch operation:',
                        error);
                });

        }
    });
};
document.addEventListener('DOMContentLoaded', SearchingMethod);


// Styling searching input with JS 
const inputSearch = document.querySelector('.inputSearch');
const categoryItem = document.querySelector('#categoryItem');
let inputStyle = ['opacity-100', 'w-80', 'pl-10', 'pr-[4.5rem]', 'cursor-text']

inputSearch.addEventListener('click', function(event) {
    categoryItem.classList.remove('hidden');
    inputSearch.classList.add(...inputStyle);
    event.stopPropagation(); // Untuk mencegah event klik dari propogasi ke parent elements
});

categoryItem.addEventListener('click', function(event) {
    inputSearch.classList.add(...inputStyle);
    event.stopPropagation(); // Untuk mencegah event klik dari propogasi ke parent elements
});

document.addEventListener('click', function(event) {
    if (!inputSearch.contains(event.target) && !categoryItem.contains(event.target)) {
        categoryItem.classList.add('hidden');
        inputSearch.classList.remove(...inputStyle);
    }
});
