import "./bootstrap";
import 'remixicon/fonts/remixicon.css';
import { gsap } from "gsap";


function swipeDown() {
    const swipeDown = ['.swipe-down-1', '.swipe-down-2', '.swipe-down-3', '.swipe-down-4', '.swipe-down-5'];
    const delays = [0.5, 1, 1.5, 2, 2.5];

    swipeDown.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                y: -100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2 // Jika ingin animasi ditunda antara elemen-elemen
            });
        }
    });
}

swipeDown();

function swipeUp() {
    const swipeUp = ['.swipe-up-1', '.swipe-up-2', '.swipe-up-3', '.swipe-up-4', '.swipe-up-5'];
    const delays = [0.5, 1, 1.5, 2, 2.5];

    swipeUp.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                y: -100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2 // Jika ingin animasi ditunda antara elemen-elemen
            });
        }
    });
}

swipeUp();


function swipeRight() {
    const swipeRight = ['.swipe-right-1', '.swipe-right-2', '.swipe-right-3', '.swipe-right-4', '.swipe-right-5'];
    const delays = [0.5, 1, 1.5, 2, 2.5];
    swipeRight.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                x: -100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2 // Jika ingin animasi ditunda antara elemen-elemen
            });
        }
    });
}
swipeRight();

function swipeLeft() {
    const swipeLeft = ['.swipe-left-1', '.swipe-left-2', '.swipe-left-3', '.swipe-left-4', '.swipe-left-5'];
    const delays = [0.5, 1, 1.5, 2, 2.5];
    swipeLeft.forEach((element, index) => {
        const targetElements = document.querySelectorAll(element);
        if (targetElements.length > 0) {
            gsap.from(targetElements, {
                x: 100,
                opacity: 0,
                duration: 1,
                delay: delays[index],
                ease: "power1.inOut",
                stagger: 0.2 // Jika ingin animasi ditunda antara elemen-elemen
            });
        }
    });
}
swipeLeft();



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
    const dropProfile = document.getElementById('dropProfile');
    let isOpen = false;

    profileThumbnail.addEventListener('click', () => {
        if (!isOpen) {
            dropProfile.classList.remove('hidden')
            gsap.to(dropProfile, {
                x: 0,
                duration: 0.3,
                ease: "power1.out",
                opacity: 1,
            });
            isOpen = true;
        } else {
            gsap.to(dropProfile, {
                x: "100%",
                duration: 0.3,
                ease: "power1.out",
                opacity: 0,
            });
            isOpen = false;
        }
    });
}
document.addEventListener('DOMContentLoaded', navProfile);

// Ajax untuk mengirim requestq dan menerima response (Modal Changes)
function modalAdd() {
    const modalOpenButtons = document.querySelector('.open-modal-add');
    if (modalOpenButtons) {
        modalOpenButtons.addEventListener('click', function() {
            const targetModal = this.getAttribute('data-target');
            const floatingModal = document.getElementById('floatingModal');

            const urlAdd = '/add/' + targetModal;
            fetch(urlAdd)
                .then(response => response.text())
                .then(data => {
                    floatingModal.innerHTML = data;

                    const modalForm = document.querySelector('.modalFormAll');
                    const modalCloseButtons = document.querySelector('.close-modal-add');

                    modalCloseButtons.addEventListener('click', function() {
                        gsap.to(modalForm, {
                            y: '-100%',
                            duration: 0.5,
                            ease: "power2.inOut",
                            opacity: 0,
                        });
                        setTimeout(() => {
                            floatingModal.innerHTML = '';
                        }, 300)
                    });
                })
                .catch(error => {
                    console.error('Terjadi kesalahan saat mengambil form penambahan.');
                });
        });
    }
};
document.addEventListener('DOMContentLoaded', modalAdd);



// Ajax untuk mengirim requestq dan menerima response (Modal Changes)
function modalChanges() {
    const modalOpenButtons = document.querySelectorAll('.open-modal-changes');

    if (modalOpenButtons) {
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
                            gsap.to(modalForm, {
                                y: '-100%',
                                duration: 0.5,
                                ease: "power2.inOut",
                                opacity: 0,
                            });
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
    }
};
document.addEventListener('DOMContentLoaded', modalChanges);


// Ajax untuk mengirim requestq dan menerima response (Modal Changes)
function modalRead() {
    const modalOpenButtons = document.querySelectorAll('.open-modal-read');

    if (modalOpenButtons) {
        modalOpenButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const asetId = this.getAttribute('data-id');
                const targetModal = this.getAttribute('data-target');
                const floatingModal = document.getElementById('floatingModal');

                const urlRead = '/read/' + asetId + '/' + targetModal;
                fetch(urlRead)
                    .then(response => response.text())
                    .then(data => {
                        floatingModal.innerHTML = data;

                        const modalForm = document.querySelector('.modalFormAll');
                        const modalCloseButtons = document.querySelector('.close-modal-read');

                        modalCloseButtons.addEventListener('click', function() {
                            gsap.to(modalForm, {
                                y: '-100%',
                                duration: 0.5,
                                ease: "power2.inOut",
                                opacity: 0,
                            });
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

    }
};
document.addEventListener('DOMContentLoaded', modalRead);



// Ajax untuk mengirim requestq dan menerima response (Modal Deleted)
function modalDelete() {
    const modalOpenButtons = document.querySelectorAll('.open-modal-delete');

    if (modalOpenButtons) {
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
                            gsap.to(modalForm, {
                                y: '-100%',
                                duration: 0.5,
                                ease: "power2.inOut",
                                opacity: 0,
                            });
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
    }
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

            fetch(`http://www.omdbapi.com/?apikey=${apiKey}&s=${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.Response === 'True') {
                        // Kirim data ke server menggunakan metode POST
                        fetch('http://localhost:8000/apitester.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(responseData => {
                                console.log(responseData);
                                // Lakukan tindakan sesuai dengan respons yang diterima dari server
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        document.getElementById('fix').innerHTML = 'Movies not Found';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
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
    event.stopPropagation();
});

categoryItem.addEventListener('click', function(event) {
    inputSearch.classList.add(...inputStyle);
    event.stopPropagation();
});

document.addEventListener('click', function(event) {
    if (!inputSearch.contains(event.target) && !categoryItem.contains(event.target)) {
        categoryItem.classList.add('hidden');
        inputSearch.classList.remove(...inputStyle);
    }
});
